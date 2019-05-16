<?php

namespace App\AdminBundle\Controller;

use App\AdminBundle\Form\LoginType;
use App\AdminBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Reponse;


/**
 * @Route("/user")
 * Class UserController
 * @package App\Controller
 */
class UserController extends AbstractController
{
    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request)
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            $this->newApi($request);

        }
        return $this->render('team/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("", name="user_post", methods={"POST"})
     * @param Request $request
     */
    public function newApi(Request $request)
    {
        /*SerializeInterface $serializer  -^ */
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $task->setUserStatus(true);
            $pass = $task->getUserPassword();
            $task->setUserPassword($task->encodePassword($pass, 'salt'));
            //$task->img_url
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            //Retour à la liste des users (equipe commerciale)
            $users = $this->getDoctrine()
                ->getRepository(User::class)
                ->findAll();

            $nbUsers = $this->getDoctrine()
                ->getRepository(User::class)
                ->countall();

            return $this->render('team/list.html.twig', array(
                'users' => $users, 'nb_users' => $nbUsers
            ));
        }

        return $this->render('team/new.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route ("/edit/{user}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request, User $user)
    {
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            //Retour à la liste des users (equipe commerciale)
            $users = $this->getDoctrine()
                ->getRepository(User::class)
                ->findAll();

            $nbUsers = $this->getDoctrine()
                ->getRepository(User::class)
                ->countall();

            return $this->render('team/list.html.twig', array(
                'users' => $users, 'nb_users' => $nbUsers
            ));
        }

        return $this->render('team/edit.html.twig', array('form' => $form->createView(), 'user' => $user));
    }

    /**
     * @Route ("/team")
     */
    public function list(Request $request)
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        $nbUsers = $this->getDoctrine()
            ->getRepository(User::class)
            ->countall();

        return $this->render('team/list.html.twig', array(
            'users' => $users, 'nb_users' => $nbUsers
        ));
    }

}
