<?php
namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\ParameterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\Parameter;
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
* @Route("/parameter")
* Class ParameterController
* @package App\Controller
*/
class ParameterController extends AbstractController
{
    /**
    * @Route("/new", name="parameter_new", methods={"GET","POST"})
    */
    public function new(Request $request)
    {
        $param = new Parameter();

        $form = $this->createForm(ParameterType::class, $param);

        $form->handleRequest($request);

        

        if ($form->isSubmitted() && $form->isValid())
        {

            $task = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->redirectToRoute('parameter_list');

        }

        return $this->render('parameter/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/edit/{id}", name="parameter_edit", methods={"PUT"})
     */
    public function edit(Request $request, Parameter $param)    
    {
        $form = $this->createForm(ParameterType::class, $param);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
           {
             $em = $this->getDoctrine()->getManager();
             $em->persist($param);
             $em->flush();
             return $this->redirectToRoute('parameter_list');
           }

           return $this->render('parameter/edit.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/delete/{id}", name="parameter_delete", methods={"DELETE"})
     */
    public function delete(Request $request)    
    {

    }


    /**
     * @Route("/list", name="parameter_list", methods={"GET"})
     */
    public function list()  
    {
         return $this->render('parameter/list.html.twig');
    }


}
