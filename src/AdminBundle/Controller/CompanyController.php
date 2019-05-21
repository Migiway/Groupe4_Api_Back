<?php

namespace App\AdminBundle\Controller;

use App\AdminBundle\Form\CompanyType;
use App\AdminBundle\Form\NoteType;
use App\AdminBundle\Entity\Company;
use App\AdminBundle\Entity\ParameterCompanyStatut;
use App\AdminBundle\Entity\Contact;
use App\AdminBundle\Entity\Note;
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
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;
use League\Csv\CannotInsertRecord;

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

        //la liste des contacts lié à l'entreprise
        $companyContacts = $this->getDoctrine()->getRepository(Contact::class)->findBy(
            [
                'company_id' => $id
            ]
        );
        //le nombre de contact de lié à l'entreprise
        $totalContact = count($companyContacts);

        //Formulaire note
        $note = new Note();

        $formNote = $this->createForm(NoteType::class, $note);

        $formNote->handleRequest($request);

        if ($formNote->isSubmitted() && $formNote->isValid()) {
            $note->setRelType('company');
            $note->setRelId($id);
            $em = $this->getDoctrine()->getManager();
            $em->persist($note);
            $em->flush();
        }

        //liste note
        $noteListe = $this->getDoctrine()->getRepository(Note::class)->findBy(['rel_id'    => $id,'rel_type'  => 'company']);

        $totalNote = count($noteListe);

        return $this->render('company/edit.html.twig', array(
            'form'          => $form->createView(),
            'formNote'      => $formNote->createView(),
            'entreprise'    => $company,
            'contacts'      => $companyContacts,
            'totalContact'  => $totalContact,
            'noteListe'     => $noteListe,
            'totalNote'     => $totalNote
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
        
        return $this->render('company/list.html.twig', array(
            'companys' => $company,
            'totalCompany' => $totalCompany
        ));

    }

    /**
     * @Route("/delete-select", name="delete-select")
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
    /**
     * @Route("/export", name="export_company")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function export_company(Request $request)
    {

        $companyscsv = $this->getDoctrine()
            ->getRepository(Company::class)
            ->findAll();


        $stack = array();


        foreach ($companyscsv as $com) {

            $comp = [$com->getCompanyName()];
            array_push($stack, $comp);

        }

        $writer = Writer::createFromFileObject(new \SplTempFileObject());
        $writer->insertAll($stack);
        $writer->output('company.csv');
        //important
        dump($stack);
        //important

        return $this->redirectToRoute('company_list', array('message' => 'all clear'));


    }
}
