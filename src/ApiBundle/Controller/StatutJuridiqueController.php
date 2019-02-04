<?php

namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\StatutJuridiqueType;
use App\AdminBundle\Entity\StatutJuridique;
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
* @Route("/statutJuridique")
*/
class StatutJuridiqueController extends AbstractController
{
  /**
  * @Route ("/new", name="statutJuridique_new", methods={"GET","POST"})
  * @param Request $request
  */
  public function newApi(Request $request){
      $statutJuridique = new StatutJuridique();

      $form = $this->createForm(StatutJuridiqueType::class, $statutJuridique);
      $form->add('submit', SubmitType::class, [
        'label' => 'Enregistrer',
      ]);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {
        $em = $this->getDoctrine()->getManager();
        $em->persist($statutJuridique);
        $em->flush();
        return $this->redirectToRoute('statutJuridique_list');
      }

      return $this->render('statutJuridique/new.html.twig', array('form' => $form->createView()));
  }

  /**
  * @Route ("/edit/{statutJuridique}", name="statutJuridique_edit", methods={"PUT"})
  * @param Request $request
  */
  public function editApi (Request $request, StatutJuridique $statutJuridique){

    $form = $this->createForm(StatutJuridiqueType::class, $statutJuridique);

    $form->add('submit', SubmitType::class, [
      'label' => 'Modifier',
    ]);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($statutJuridique);
      $em->flush();
      return $this->redirectToRoute('statutJuridique_list');
    }

    return $this->render('statutJuridique/new.html.twig', array('form' => $form->createView()));
  }
    /**
     * @Route ("/delete", name="statusJuridique_delete", methods={"DELETE"})
     * @param Request $request
     */
    public function deleteApi(Request $request)
    {

    }

  /**
   * @Route("/list", name="statutJuridique_list", methods={"GET"})
   */
  public function list (Request $request){

  }
}
