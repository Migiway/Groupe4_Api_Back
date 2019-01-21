<?php

namespace App\ApiBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApiBundle extends Bundle
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
