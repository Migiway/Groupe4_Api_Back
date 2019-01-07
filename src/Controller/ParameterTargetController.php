<?php

namespace App\Controller;

use App\Form\ParameterTargetType;
use App\Entity\ParameterTarget;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Serializer\SerializerInterface;

/**
* @Route("/parameterTarget")
*/
class ParameterTargetController extends AbstractController
{
  /**
  * @Route ("/new")
  * @param Request $request
  */
  public function new(Request $request){
      $parameterTarget = new ParameterTarget();

      $form = $this->createForm(ParameterTargetType::class, $parameterTarget);
      $form->add('submit', SubmitType::class, [
        'label' => 'Enregistrer',
      ]);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {
        $em = $this->getDoctrine()->getManager();
        $em->persist($parameterTarget);
        $em->flush();
        return $this->redirectToRoute('parameterTarget_list');
      }

      return $this->render('parameterTarget/edit.html.twig', array('form' => $form->createView()));
  }

  /**
  * @Route ("/edit/{parameterTarget}")
  * @param Request $request
  */
  public function edit (Request $request, ParameterTarget $parameterTarget){

    $form = $this->createForm(ParameterTargetType::class, $parameterTarget);

    $form->add('submit', SubmitType::class, [
      'label' => 'Modifier',
    ]);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($parameterTarget);
      $em->flush();
      return $this->redirectToRoute('parameterTarget_list');
    }

    return $this->render('parameterTarget/new.html.twig', array('form' => $form->createView()));
  }

  /**
   * @Route("/list", name="parameterTarget_list")
   */
  public function list (Request $request){

  }
}
