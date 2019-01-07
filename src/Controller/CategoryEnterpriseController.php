<?php

namespace App\Controller;

use App\Form\CategoryEnterpriseType;
use App\Entity\CategoryEnterprise;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Serializer\SerializerInterface;

/**
* @Route("/categoryEnterprise")
*/
class CategoryEnterpriseController extends AbstractController
{
  /**
  * @Route ("/new")
  * @param Request $request
  */
  public function new(Request $request){
      $categoryEnterprise = new CategoryEnterprise();

      $form = $this->createForm(CategoryEnterpriseType::class, $categoryEnterprise);
      $form->add('submit', SubmitType::class, [
        'label' => 'Enregistrer',
      ]);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {
        $em = $this->getDoctrine()->getManager();
        $em->persist($categoryEnterprise);
        $em->flush();
        return $this->redirectToRoute('categoryEnterprise_list&');
      }

      return $this->render('categoryEnterprise/new.html.twig', array('form' => $form->createView()));
  }

  /**
  * @Route ("/edit/{categoryEnterprise}")
  * @param Request $request
  */
  public function edit (Request $request, CategoryEnterprise $categoryEnterprise){

    $form = $this->createForm(CategoryEnterpriseType::class, $categoryEnterprise);

    $form->add('submit', SubmitType::class, [
      'label' => 'Modifier',
    ]);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($categoryEnterprise);
      $em->flush();
      return $this->redirectToRoute('categoryEnterprise_list');
    }

    return $this->render('categoryEnterprise/edit.html.twig', array('form' => $form->createView()));
  }

  /**
   * @Route("/list", name="categoryEnterprise_list")
   */
  public function list (Request $request){

  }
}
