<?php

namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\CompanyType;
use App\AdminBundle\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
* @Route("/company")
*/
class CompanyController extends AbstractController
{

  /**
  * @Route("/new", name="company_new", methods={"GET","POST"})
  * @param Request $request

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
  }*/

    /**
     * @Route("/companyActif", name="companyActif", methods={"GET"})
     */
    public function companyActif()
    {
        $repository = $this->getDoctrine()->getRepository(Company::class);
        $companyActif = $repository->findBy(
            ['companyStatus' => 1]
        );
        $companyActif = count($companyActif);
        return new JsonResponse(['companyActif' => $companyActif]);
    }

    /**
     * @Route("/newCompany/{time}", name="newCompany", methods={"GET"})
     */
    public function newCompany($time)
    {
        $period = "";
        switch($time){
            case "day":
                $period = "-1 days";
                break;
            case "week":
                $period = "-1 week";
                break;
            case "month":
                $period = "-1 month";
                break;
            case "year":
                $period = "-1 year";
                break;
        }
        $repository = $this->getDoctrine()->getRepository(Company::class);
        $newcontact = $repository->newCompany($period);

        $period = "-3 year";
        $repository = $this->getDoctrine()->getRepository(Company::class);
        $pourcentage = $repository->newCompany($period);


        $newcompany = intval($newcontact['nb']);

        $result2 = $pourcentage['nb'];
        $result2 = intval($result2);

        $PourcentCont = ($newcompany/$result2)*100;

        $PourcentCont = intval($PourcentCont);

        return new JsonResponse(['newCompany' => $newcompany, 'pourcent' => $PourcentCont]);

    }

}
