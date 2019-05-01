<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use App\AdminBundle\Entity\User;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, ObjectManager $manager): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        $this->get('security.token_storage')->setToken(null);
        $request->getSession()->invalidate();

        return $this->redirect($this->generateUrl('app_login'));
    }

    /**
     * @Route("/forgot-password", name="app_forgot_password")
     */
    public function forgotPasswordAction(Request $request, \Swift_Mailer $mailer)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('contact_list'));
        }

        $dbm = $this->getDoctrine()->getManager();

        $obj = new \App\AdminBundle\Entity\ForgotPassword();
        $form = $this->createForm(\App\AdminBundle\Form\ForgotPasswordType::class, $obj);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $obj = $form->getData();

            $user = $this->getDoctrine()
                ->getRepository('AdminBundle:User')->findOneBy(array('user_email' => $obj->getTmpEmail()));

            if (!$user) {
                $this->get('session')->getFlashBag()->add(
                    'ALERT_ERROR',
                    'Aucun email associé'
                );

                return $this->redirectToRoute('app_forgot_password');
            } else {
                $token = uniqid(rand(100, 999));
                $resetPasswordLink = $this->generateUrl('app_reset_password', array('id' => $user->getId(), 'key' => $token), \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL);

                $this->sendEmailToForgotPasswordUser($mailer, $user, $resetPasswordLink);

                $this->get('session')->getFlashBag()->add(
                    'ALERT_SUCCESS',
                    'Cliquez sur le lien reçu dans votre boite mail'
                );

                $user->setResetPasswordToken($token);
                $dbm->persist($user);
                $dbm->flush();

                return $this->redirectToRoute('app_forgot_password');
            }
        }

        $arr = array(
            'form' => $form->createView()
        );
        return $this->render('security/forgot_password.html.twig', $arr);
    }

    /**
     * @Route("/reset-password/{id}/{key}", name="app_reset_password")
     */
    public function resetPasswordAction(Request $request, $id, $key)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('contact_list'));
        }

        $user = $this->getDoctrine()->getRepository('AdminBundle:User')->find($id);
        if (!$user) {
            $this->get('session')->getFlashBag()->add('ALERT_ERROR', 'Invalid request!');
            return $this->redirectToRoute('app_login');
        }
        if ($key != $user->getResetPasswordToken()) {
            $this->get('session')->getFlashBag()->add('ALERT_ERROR', 'Invalid request!');
            return $this->redirectToRoute('app_login');
        }

        $dbm = $this->getDoctrine()->getManager();
        $form = $this->createForm(\App\AdminBundle\Form\UserChangePasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $data->setResetPasswordToken(null);
            $dbm->persist($data);
            $dbm->flush();

            $this->get('session')->getFlashBag()->add(
                'ALERT_SUCCESS',
                'Votre mot de passe a bien été changé.'
            );

            return $this->redirectToRoute('app_login');
        }

        $arr = array(
            'form' => $form->createView()
        );
        return $this->render('security/reset_password.html.twig', $arr);
    }

    private function sendEmailToForgotPasswordUser($mailer, $obj, $resetPasswordLink)
    {
        $message = new \Swift_Message();
        $message->setSubject('Nouveau mot de passe')
            ->setFrom('smartleads@email.com')
            ->setTo($obj->getUserEmail())
            ->setContentType('text/html')
            ->setBody(
                $this->renderView(
                    'email/forgot_password.html.twig',
                    array('user' => $obj, 'resetLink' => $resetPasswordLink)
                ),
                'text/html'
            );

        return $mailer->send($message);
    }
}
