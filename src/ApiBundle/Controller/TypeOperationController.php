<?php

namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\TypeOperationType;
use App\AdminBundle\Entity\TypeOperation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Serializer\SerializerInterface;

/**
* @Route("/typeOperation")
*/
class TypeOperationController extends AbstractController
{
  /**
  * @Route ("/new", name="typeOperation_new", methods={"GET","POST"})
  * @param Request $request
  */
  public function newApi(Request $request){
      $typeOperation = new TypeOperation();

      $form = $this->createForm(TypeOperationType::class, $typeOperation);
      $form->add('submit', SubmitType::class, [
        'label' => 'Enregistrer',
      ]);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {
        $em = $this->getDoctrine()->getManager();
        $em->persist($typeOperation);
        $em->flush();
        return $this->redirectToRoute('typeOperation_list');
      }

      return $this->render('typeOperation/new.html.twig', array('form' => $form->createView()));
  }

  /**
  * @Route ("/edit/{typeOperation}", name="typeOperation_edit", methods={"PUT"})
  * @param Request $request
  */
  public function editApi (Request $request, TypeOperation $typeOperation){

    $form = $this->createForm(TypeOperationType::class, $typeOperation);

    $form->add('submit', SubmitType::class, [
      'label' => 'Modifier',
    ]);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($typeOperation);
      $em->flush();
      return $this->redirectToRoute('typeOperation_list');
    }

    return $this->render('typeOperation/edit.html.twig', array('form' => $form->createView()));
  }
    /**
     * @Route ("/delete", name="typeOperation_delete", methods={"DELETE"})
     * @param Request $request
     */
    public function deleteApi(Request $request)
    {

    }

  /**
   * @Route("/list", name="typeOperation_list", methods={"GET"})
   */
  public function list (Request $request){

  }
}
