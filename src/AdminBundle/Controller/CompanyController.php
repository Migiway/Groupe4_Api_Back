<?php

namespace App\AdminBundle\Controller;

use App\AdminBundle\Form\CompanyType;
use App\AdminBundle\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Serializer\SerializerInterface;

/**
* @Route("/company")
*/
class CompanyController extends AbstractController
{
  /**
  * @Route ("/new")
  * @param Request $request
  */
  public function new(Request $request){
      $company = new Company();

      $form = $this->createForm(CompanyType::class, $company);
      
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {
        $em = $this->getDoctrine()->getManager();
        $em->persist($company);
        $em->flush();
        return $this->redirectToRoute('company_list');
      }

      return $this->render('company/new.html.twig', array('form' => $form->createView()));
  }

  /**
  * @Route ("/edit/{id}", methods={"GET", "POST"})
  */
  public function edit (Request $request, string $id){
    //dump($company);

    $company = $this->getDoctrine()
          ->getRepository(Company::class)
          ->find($id);

   // dump($request->get('company')); die;
    $form = $this->createForm(CompanyType::class, $company);

    //dump($company);
    //dump($company->getCompanyName());die;

    $form->handleRequest($request);

   // dump($company); die;

    if ($form->isSubmitted() && $form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($company);
      $em->flush();
      return $this->redirectToRoute('company_list');
    }

    return $this->render('company/edit.html.twig', array('form' => $form->createView()));
  }

  /**
  * @Route ("/delete")
  * @param Request $request
  */
  public function delete (Request $request){

  }

  /**
   * @Route("/list", name="company_list")
   * @param Request $request
   * @return \Symfony\Component\HttpFoundation\Response
   */
  public function list (Request $request){
      $company = $this->getDoctrine()
          ->getRepository(Company::class)
          ->findAll();


      return $this->render('company/list.html.twig', array(
          'company' => $company
      ));

  }
}
