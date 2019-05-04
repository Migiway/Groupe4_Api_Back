<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\AdminBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/profile")
 * Class ProfileController
 * @package App\Controller
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_profile_index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        //formulaire Identite
        $form = $this->createForm(\App\AdminBundle\Form\ProfileType::class, $user);
        $form->handleRequest($request);
        //formulaire password
        $formPassword = $this->createForm(\App\AdminBundle\Form\ProfileChangePasswordType::class, $user);
        $formPassword->handleRequest($request);

        $arr = array(
            'form' => $form->createView(),
            'formPassword' => $formPassword->createView()
        );
        //save profil data
        if ($form->isSubmitted() && $form->isValid()) {
            $obj = $form->getData();

            $this->getDoctrine()->getManager()->persist($obj);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_admin_profile_index');
        }

        //save password data
        if ($formPassword->isSubmitted() && $formPassword->isValid()) {
            $password = $formPassword->getData();

            $this->getDoctrine()->getManager()->persist($password);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_admin_profile_index');
        }
        elseif ($formPassword->isSubmitted() && $formPassword->isValid() ==  false) {
            $arr = array(
            'form' => $form->createView(),
            'formPassword' => $formPassword->createView(),
            'onglet_password'=> true
            );
            return $this->render('profile/form.html.twig', $arr);
        }

        return $this->render('profile/form.html.twig', $arr);
    }

    /**
     * @Route("/password", name="app_admin_password_edit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request)
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(\App\AdminBundle\Form\ProfileChangePasswordType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $obj = $form->getData();

            $this->getDoctrine()->getManager()->persist($obj);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_admin_password_edit');
        }

        $arr = array(
            'form' => $form->createView()
        );

        return $this->render('profile/pass.html.twig', $arr);
    }
}
