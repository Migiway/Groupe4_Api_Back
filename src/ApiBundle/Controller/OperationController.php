<?php

namespace App\ApiBundle\Controller;
use App\AdminBundle\Form\OperationType;
use App\AdminBundle\Entity\Operation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Serializer\SerializerInterface;

/**
* @Route("/operation")
* Class CompanyController
* @package App\Controller
*/
class OperationController extends AbstractController
{
  /**
  * @Route("/new", name="operation_new", methods={"GET","POST"})
  * @param Request $request
  * @return \Symfony\Component\HttpFoundation\Response
  */
  public function new(Request $request){
    $operation = new Operation();
    $form = $this->createForm(OperationType::class, $operation);
    $form->add('submit', SubmitType::class, [
      'label' => 'Ajouter',
      'attr' => ['class' => 'btn btn-default pull-right'],
    ]);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($operation);
      $em->flush();
      return $this->redirectToRoute('operation_list');
    }

    /*if($request->isMethod('POST')){
            $this->newPost($request);
    }*/

    return $this->render('operation/new.html.twig', array(
        'form' => $form->createView(),
    ));

  }

    /**
    * @Route("/edit/{operation}", name="operation_edit", methods={"PUT"})
    * @param Request $request
    */
    public function edit(Request $request, Operation $operation){
      $form = $this->createForm(OperationType::class, $operation);
      $form->add('submit', SubmitType::class, [
        'label' => 'Modifier',
        'attr' => ['class' => 'btn btn-default pull-right'],
      ]);

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid())
      {
        $em = $this->getDoctrine()->getManager();
        $em->persist($operation);
        $em->flush();
        return $this->redirectToRoute('operation_list');
      }

      return $this->render('operation/new.html.twig', array('form' => $form->createView()));
    }

    /**
    * @Route("/delete/{operation}", name="operation_edit", methods={"DELETE"})
    * @param Request $request
    */
    public function delete(Request $request){
    }

    /**
     * @Route("/list_api", name="operation_list_api", methods={"GET"})
     * @param Request $request
     */
    public function list(Request $request){
    }

}
