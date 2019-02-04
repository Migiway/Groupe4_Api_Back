<?php

namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\CAType;
use App\AdminBundle\Entity\CA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Serializer\SerializerInterface;

/**
* @Route("/ca")
*/
class CAController extends AbstractController
{
 /**
 * @Route("/new", name="ca_new", methods={"GET","POST"})
 * @param Request $request
 */
 public function new(Request $request){
     $ca = new CA();

     $form = $this->createForm(CAType::class, $ca);
     $form->add('submit', SubmitType::class, [
       'label' => 'Enregistrer',
     ]);

     $form->handleRequest($request);

     if ($form->isSubmitted() && $form->isValid())
     {
       $em = $this->getDoctrine()->getManager();
       $em->persist($ca);
       $em->flush();
       return $this->redirectToRoute('ca_list');
     }

     return $this->render('ca/new.html.twig', array('form' => $form->createView()));
 }

 /**
 * @Route("/edit/{ca}", name="ca_edit", methods={"PUT"})
 * @param Request $request
 */
 public function edit (Request $request, CA $ca){

   $form = $this->createForm(CAType::class, $ca);

   $form->add('submit', SubmitType::class, [
     'label' => 'Modifier',
   ]);
   $form->handleRequest($request);
   if ($form->isSubmitted() && $form->isValid())
   {
     $em = $this->getDoctrine()->getManager();
     $em->persist($ca);
     $em->flush();
     return $this->redirectToRoute('ca_list');
   }

   return $this->render('ca/edit.html.twig', array('form' => $form->createView()));
 }

  /**
  * @Route("/list", name="ca_list", methods={"GET"})
  */
  public function list (Request $request){

  }

  /**
   * @Route("/delete/{ca}", name="ca_delete", methods={"DELETE"})
   * @param Request $request
   */
   public function deleteApi(){

   }
}
