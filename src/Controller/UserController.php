<?php
namespace App\Controller;

use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;




class UserController extends AbstractController
{
	/**
	* @Route("/user", name="user")
	**/
    public function new(Request $request)
    {
    	$user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            return $this->redirectToRoute('list.html.twig');
        }

        return $this->render('User/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/user/edit/{id}", name="user_edit")
     */
    public function edit(Request $request)	
    {

    }

    /**
     * @Route("/user/delete/{id}", name="user_delete")
     */
    public function delete(Request $request)	
    {

    }

    /**
     * @Route("/user/list", name="user_list")
     */
    public function list()	
    {

    }
    

}