<?php

namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\NbSalaryType;
use App\AdminBundle\Entity\NbSalary;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Serializer\SerializerInterface;

/**
* @Route("/nbSalary")
*/
class NbSalaryController extends AbstractController
{
  /**
  * @Route("/new", name="nbSalary_new", methods={"GET","POST"})
  * @param Request $request
  */
  public function new(Request $request){
      $nbSalary = new NbSalary();

      $form = $this->createForm(NbSalaryType::class, $nbSalary);
      $form->add('submit', SubmitType::class, [
        'label' => 'Enregistrer',
      ]);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {
        $em = $this->getDoctrine()->getManager();
        $em->persist($nbSalary);
        $em->flush();
        return $this->redirectToRoute('nbSalary_list');
      }

      return $this->render('nbSalary/new.html.twig', array('form' => $form->createView()));
  }

  /**
  * @Route ("/edit/{nbSalary}", name="nbSalary_edit", methods={"PUT"})
  * @param Request $request
  */
  public function edit (Request $request, NbSalary $nbSalary){

    $form = $this->createForm(NbSalaryType::class, $nbSalary);

    $form->add('submit', SubmitType::class, [
      'label' => 'Modifier',
    ]);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($nbSalary);
      $em->flush();
      return $this->redirectToRoute('nbSalary_list');
    }

    return $this->render('nbSalary/edit.html.twig', array('form' => $form->createView()));
  }

  /**
  * @Route("/list", name="nbSalary_list", methods={"GET"})
  */
  public function list (Request $request){

  }

  /**
  * @Route("/delete/{nbSalary}", name="nbSalary_delete", methods={"DELETE"})
  */
  public function delete(Request $request)
  {

  }
}
