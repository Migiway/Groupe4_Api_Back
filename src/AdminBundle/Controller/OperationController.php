<?php

namespace App\AdminBundle\Controller;

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

/**
* @Route("/operation")
*/
class OperationController extends AbstractController
{
  /**
  * @Route ("/new")
  * @param Request $request
  */
  public function new(Request $request){
      $operation = new Operation();

      $form = $this->createForm(OperationType::class, $operation);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {
          return $this->redirectToRoute('operation_list');
      }

      return $this->render('operation/new.html.twig', array('form' => $form->createView()));
  }

  /**
  * @Route ("/edit")
  * @param Request $request
  */
  public function edit (Request $request){

  }

  /**
  * @Route ("/delete")
  * @param Request $request
  */
  public function delete (Request $request){

  }

}
