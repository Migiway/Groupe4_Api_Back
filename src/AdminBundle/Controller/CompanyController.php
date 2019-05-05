<?php

namespace App\AdminBundle\Controller;

use App\AdminBundle\Form\CompanyType;
use App\AdminBundle\Entity\Company;
use App\AdminBundle\Entity\ParameterCompanyStatut;
use App\AdminBundle\Entity\Contact;
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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request)
    {
        $company = new Company();

        $form = $this->createForm(CompanyType::class, $company);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
    public function edit(Request $request, string $id)
    {
        $company = $this->getDoctrine()->getRepository(Company::class)->find($id);

        $form = $this->createForm(CompanyType::class, $company);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $company->setCompanyUpdatedAt(new \DateTime('now'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($company);
            $em->flush();
            return $this->redirectToRoute('company_list');
        }

        //les infos de l'entreprise
        $entreprise = $this->getDoctrine()->getRepository(Company::class)->find($company);
        //la liste des contacts lié à l'entreprise
        $companyContacts = $this->getDoctrine()->getRepository(Contact::class)->findBy(
                [
                    'company_id' => $id
                ]
            );
        //le nombre de contact de lié à l'entreprise
        $totalContact = count($companyContacts);

        return $this->render('company/edit.html.twig', array(
            'form' => $form->createView(),
            'entreprise' => $entreprise,
            'contacts' => $companyContacts,
            'totalContact' => $totalContact
        ));
    }

    /**
     * @Route("/delete/{id}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete(Request $request, Company $company)
    {
        $uneEntreprise = $this->getDoctrine()->getRepository(Company::class)->find($company);
        $em = $this->getDoctrine()->getManager();
        $em->remove($uneEntreprise);
        $em->flush();

        return $this->redirectToRoute('company_list', array('message' => 'all clear'));
    }

    /**
     * @Route("/list", name="company_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list(Request $request)
    {
        $company = $this->getDoctrine()->getRepository(Company::class)->findAll();

        $totalCompany = count($company);
        /*foreach ($company as $key => $value) {
            $colorStatut = $this->getDoctrine()->getRepository(ParameterCompanyStatut::class)->findBy(['id' => $value->companyStatus]);
        }*/
        dump($company);die;
        return $this->render('company/list.html.twig', array(
            'companys' => $company,
            'totalCompany' => $totalCompany
        ));

    }

    /**
     * @Route("/delete-select", name="delete_select")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete_select(Request $request)
    {
        $idCompanys = $_POST['companys'];
        $arr = explode(',', $idCompanys);
        $totalId    = count($arr);
        for ($i=0; $i < $totalId ; $i++) {
            $uneEntreprise = $this->getDoctrine()->getRepository(Company::class)->findBy(['id' => $arr[$i]]);
            $em = $this->getDoctrine()->getManager();
            $em->remove($uneEntreprise[0]);
            $em->flush();
        }
        return $this->redirectToRoute('company_list', array('message' => 'all clear'));
    }
}
