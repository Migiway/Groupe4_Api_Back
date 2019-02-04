<?php

namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\CompanyType;
use App\AdminBundle\Entity\Company;
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
* @Route("/company")
*/
class CompanyController extends AbstractController
{

  /**
   * @Route("", methods={"POST"})
   * @param Request $request
   */
  public function newApi(Request $request, SerializerInterface $serializer)
  {
      $company = new Company();

      $form = $this->createForm(CompanyType::class, $company);
      $form->handleRequest($request);

      $em = $this->getDoctrine()->getManager();
      $em->persist($company);
      $em->flush();

      $JSON = $serializer->serrialize(
        $company,
        'JSON',
        ['Groups=["light"]']
      );
      $response = new Response();
      $response->setContent($JSON);
      $response->headers->set('Content-type','application/JSON');
      return $response;

      // if ($form->isValid()) {
      //
      //   return $this->redirectToRoute('company_list');
      // }
  }

  /**
   * @Route("", methods={"PUT"})
   * @param Request $request
   */
   public function editApi(){

   }

  /**
   * @Route("", methods={"DELETE"})
   * @param Request $request
   */
   public function deleteApi(){

   }

}
