<?php
namespace App\Controller;

use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
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
	*/
    public function new(Request $request)
    {
    	$user = new User();

        $form = $this->createForm(UserType::class, $user);

		$form->handleRequest($request);

		if ($request->isMethod('POST')) {
        	$this->newApi($request);

        }

       /* if ($form->isSubmitted() && $form->isValid())
        {

            $task = $form->getData();

        	$entityManager = $this->getDoctrine()->getManager();
        	$entityManager->persist($task);
        	$entityManager->flush();

        }*/

        return $this->render('user/new.html.twig', array('form' => $form->createView()));
    }

    /**
	* @Route("", name="user_post", methods={"POST"})
	*/
    public function newApi(Request $request)
    {
    	/*SerializeInterface $serializer  -^ */
    	$user = new User();

        $form = $this->createForm(UserType::class, $user);

    	$form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
        	$task = $form->getData();
        	$entityManager = $this->getDoctrine()->getManager();
        	$entityManager->persist($task);
        	$entityManager->flush();
        }

        /*$json = $serializer->Serialize(
    		$user,
    		'JSON',
    		['Groups'=>["light"]]
    	);

    	$response = new response();
    	$response->setContent($json);
    	$response->headers->set('Content-type', 'application/JSON');*/

    }

   /**
     * @Route("/edit/{id}", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user)
    {
    	$form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
           {
             $em = $this->getDoctrine()->getManager();
             $em->persist($user);
             $em->flush();
             return $this->redirectToRoute('user_list');
           }

           return $this->render('User/edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("", name="user_edit", methods={"PUT"})
     */
    public function editApi(Request $request)
    {

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
     * @Route("/delete/{id}", name="user_delete", methods={"GET","POST"})
     */
    public function delete(Request $request)
    {

    }
    /**
     * @Route("", name="user_delete", methods={"DELETE"})
     */
    public function deleteApi(Request $request)
    {

    }


    /**
     * @Route("/list", name="user_list")
     */
    public function list()
    {
    	 return $this->render('User/list.html.twig');
    }

    /**
     * @Route("/user/list", name="user_list")
     */
    public function list()
    {

    }


}
