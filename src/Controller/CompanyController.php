<?php

namespace App\Controller;

use App\Form\CompanyType;
use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

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
          return $this->redirectToRoute('company_list');
      }

      return $this->render('company/new.html.twig', array('form' => $form->createView()));
  }

  /**
  * @Route ("/edit")
  * @param Request $request
  */
  public function edit (Request $request){

  }

  /**
  * @Route ("/delete")
  * @param Request $request
  */
  public function delete (Request $request){

  }

  /**
  * @Route ("/imap_listscan")
  * @param Request $request
  */
  public function list (Request $request){

  }
}
