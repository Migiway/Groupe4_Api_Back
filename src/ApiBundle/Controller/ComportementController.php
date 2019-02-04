<?php
namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\ComportementType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\Comportement;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Reponse;


/**
* @Route("/comportement")
* Class ComportementController
* @package App\Controller
*/
class ComportementController extends AbstractController
{
    /**
    * @Route("/new", name="comportement_new", methods={"GET","POST"})
    */
    public function new(Request $request)
    {
        $comp = new Comportement();

        $form = $this->createForm(ComportementType::class, $comp);

        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid())
        {

            $task = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->redirectToRoute('comportement_list');

        }

        return $this->render('comportement/new.html.twig', array('form' => $form->createView()));
    }

  /**
  * @Route("/edit/{comportement}", name="comportement_edit", methods={"PUT"})
  */
  public function edit(Request $request, Comportement $comp)
  {
    $form = $this->createForm(ComportementType::class, $comp);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($comp);
      $em->flush();
      return $this->redirectToRoute('comportement_list');
    }

    return $this->render('comportement/edit.html.twig', array('form' => $form->createView()));
  }

  /**
   * @Route("/delete/{comportement}", name="comportement_delete", methods={"DELETE"})
   */
  public function delete(Request $request)
  {

  }


  /**
  * @Route("/list", name="comportement_list", methods={"GET"})
  */
  public function list()
  {
       return $this->render('comportement/list.html.twig');
  }


}
