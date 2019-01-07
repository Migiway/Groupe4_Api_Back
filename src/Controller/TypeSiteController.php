<?php

namespace App\Controller;

use App\Form\TypeSiteType;
use App\Entity\TypeSite;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Serializer\SerializerInterface;

/**
* @Route("/typeSite")
*/
class TypeSiteController extends AbstractController
{
  /**
  * @Route ("/new")
  * @param Request $request
  */
  public function new(Request $request){
      $typeSite = new TypeSite();

      $form = $this->createForm(TypeSiteType::class, $typeSite);
      $form->add('submit', SubmitType::class, [
        'label' => 'Enregistrer',
      ]);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {
        $em = $this->getDoctrine()->getManager();
        $em->persist($typeSite);
        $em->flush();
        return $this->redirectToRoute('typeSite_list');
      }

      return $this->render('typeSite/new.html.twig', array('form' => $form->createView()));
  }

  /**
  * @Route ("/edit/{typeSite}")
  * @param Request $request
  */
  public function edit (Request $request, TypeSite $typeSite){

    $form = $this->createForm(TypeSiteType::class, $typeSite);

    $form->add('submit', SubmitType::class, [
      'label' => 'Modifier',
    ]);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($typeSite);
      $em->flush();
      return $this->redirectToRoute('typeSite_list');
    }

    return $this->render('typeSite/edit.html.twig', array('form' => $form->createView()));
  }

  /**
   * @Route("/list", name="typeSite_list")
   */
  public function list (Request $request){

  }
}
