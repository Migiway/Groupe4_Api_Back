<?php

namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\TypeSiteType;
use App\AdminBundle\Entity\TypeSite;
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
  * @Route ("/new", name="typeSite_new", methods={"GET","POST"})
  * @param Request $request
  */
  public function newApi(Request $request){
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
  * @Route ("/edit/{typeSite}", name="typeSite_edit", methods={"PUT"})
  * @param Request $request
  */
  public function editApi (Request $request, TypeSite $typeSite){

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
     * @Route ("/delete", name="typeSite_delete", methods={"DELETE"})
     * @param Request $request
     */
    public function deleteApi(Request $request)
    {

    }
    /**
     * @Route ("/list", name="typeSite_list", methods={"GET"})
     * @param Request $request
     */
    public function list (Request $request)
    {

    }
}
