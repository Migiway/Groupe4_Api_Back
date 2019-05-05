<?php

namespace App\AdminBundle\Controller;

use App\AdminBundle\Entity\Colors;
use App\AdminBundle\Form\ColorType;
use App\AdminBundle\Form\ParameterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\Parameter;
use App\AdminBundle\Entity\ParameterCompanyCA;
use App\AdminBundle\Entity\ParameterCompanyEffectifs;
use App\AdminBundle\Entity\ParameterCompanySecteur;
use App\AdminBundle\Entity\ParameterCompanyStatutJuridique;
use App\AdminBundle\Entity\ParameterCompanyStatut;
use App\AdminBundle\Entity\ParameterOperation;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Reponse;
use App\AdminBundle\Form\ParameterCompanyCAType;
use App\AdminBundle\Form\ParameterCompanyEffectifsType;
use App\AdminBundle\Form\ParameterCompanySecteurType;
use App\AdminBundle\Form\ParameterCompanyStatutType;
use App\AdminBundle\Form\ParameterCompanyStatutJuridiqueType;
use App\AdminBundle\Form\ParameterOperationType;

/**
 * @Route("/parameter")
 * Class ParameterController
 * @package App\Controller
 */
class ParameterController extends AbstractController
{
    /**
     * @Route("/", name="identite_index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        //Paramètre partie idendité
        $parameterIdentite = $this->getDoctrine()->getRepository(Parameter::class)->find("1");

        $formParameterIdentite = $this->createForm(ParameterType::class, $parameterIdentite);

        $formParameterIdentite->handleRequest($request);

        if ($formParameterIdentite->isSubmitted() && $formParameterIdentite->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parameterIdentite);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        //Paramètre partie opération
        $parameterOperation = $this->getDoctrine()->getRepository(ParameterOperation::class)->find("1");

        $formParameterOperation = $this->createForm(ParameterOperationType::class, $parameterOperation);

        $formParameterOperation->handleRequest($request);

        if ($formParameterOperation->isSubmitted() && $formParameterOperation->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parameterOperation);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        //Paramètre partie entreprise /company
        $companyCA              = $this->getDoctrine()->getRepository(ParameterCompanyCA::class)->findAll();
        $companyEffectifs       = $this->getDoctrine()->getRepository(ParameterCompanyEffectifs::class)->findAll();
        $companySecteur         = $this->getDoctrine()->getRepository(ParameterCompanySecteur::class)->findAll();
        $companyStatutJuridique = $this->getDoctrine()->getRepository(ParameterCompanyStatutJuridique::class)->findAll();
        $companyStatut          = $this->getDoctrine()->getRepository(ParameterCompanyStatut::class)->findAll();

        //Fin Paramètre partie entreprise /company
        $arr = array(
            'formParameterIdentite'     => $formParameterIdentite->createView(),
            'formParameterOperation'    => $formParameterOperation->createView(),
            'companyCA'                 => $companyCA,
            'companyEffectifs'          => $companyEffectifs,
            'companySecteur'            => $companySecteur,
            'companyStatutJuridique'    => $companyStatutJuridique,
            'companyStatut'             => $companyStatut,
        );
        return $this->render('parameter/form.html.twig', $arr);
        
    }

    /**
     * @Route("/color/part", name="body_color_part")
     */
    public function colorpart()
    {
        $col = $this->getDoctrine()->getRepository(Colors::class)->find(1);
        return $this->render('bodycolor/colorpart.html.twig',
            ['Color' => $col]);
    }

    /**
     * @Route("/color/update", name="body_color_update")
     */
    public function coloradd(Request $request)
    {
        $col = $this->getDoctrine()->getRepository(Colors::class)->find(1);
        if ($request->getMethod() == "POST") {
            $em = $this->getDoctrine()->getManager();
            $color = $em->getRepository(Colors::class)->find(1);
            $color->setColorsCode($request->get('code'));
            $em->flush();
        }
        return $this->render('bodycolor/addcolor.html.twig',
            ['Color' => $col]);
    }

    /**
     * @Route ("/newCompanyCA")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newCompanyCA(Request $request)
    {
        $companyCA = new ParameterCompanyCA();

        $form = $this->createForm(ParameterCompanyCAType::class, $companyCA);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companyCA);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('companyParameter/form_ca.html.twig', array('form' => $form->createView()));
    }


    
    /**
     * @Route ("/editCompanyCA/{id}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editCompanyCA(Request $request, string $id)
    {
        $companyCA = $this->getDoctrine()->getRepository(ParameterCompanyCA::class)->find($id);

        $form = $this->createForm(ParameterCompanyCAType::class, $companyCA);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companyCA);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('companyParameter/form_ca.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/newCompanyEffectif")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newCompanyEffectif(Request $request)
    {
        $companyEffectif = new ParameterCompanyEffectifs();

        $form = $this->createForm(ParameterCompanyEffectifsType::class, $companyEffectif);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companyEffectif);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('companyParameter/form_effectifs.html.twig', array('form' => $form->createView()));
    }


    
    /**
     * @Route ("/editCompanyEffectif/{id}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editCompanyEffectif(Request $request, string $id)
    {
        $companyEffectif = $this->getDoctrine()->getRepository(ParameterCompanyEffectifs::class)->find($id);

        $form = $this->createForm(ParameterCompanyEffectifsType::class, $companyEffectif);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companyEffectif);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('companyParameter/form_effectifs.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/newCompanySecteur")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newCompanySecteur(Request $request)
    {
        $companySecteur = new ParameterCompanySecteur();

        $form = $this->createForm(ParameterCompanySecteurType::class, $companySecteur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companySecteur);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('companyParameter/form_secteur.html.twig', array('form' => $form->createView()));
    }


    
    /**
     * @Route ("/editCompanySecteur/{id}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editCompanySecteur(Request $request, string $id)
    {
        $companySecteur = $this->getDoctrine()->getRepository(ParameterCompanySecteur::class)->find($id);

        $form = $this->createForm(ParameterCompanySecteurType::class, $companySecteur);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companySecteur);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('companyParameter/form_secteur.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/newCompanyStatut")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newCompanyStatut(Request $request)
    {
        $companyStatut = new ParameterCompanyStatut();

        $form = $this->createForm(ParameterCompanyStatutType::class, $companyStatut);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companyStatut);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('companyParameter/form_statut.html.twig', array('form' => $form->createView()));
    }


    
    /**
     * @Route ("/editCompanyStatut/{id}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editCompanyStatut(Request $request, string $id)
    {
        $companyStatut = $this->getDoctrine()->getRepository(ParameterCompanyStatut::class)->find($id);

        $form = $this->createForm(ParameterCompanyStatutType::class, $companyStatut);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companyStatut);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('companyParameter/form_statut.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/newCompanyStatutJuridique")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newCompanyStatutJuridique(Request $request)
    {
        $companyJuridique = new ParameterCompanyStatutJuridique();

        $form = $this->createForm(ParameterCompanyStatutJuridiqueType::class, $companyJuridique);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companyJuridique);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('companyParameter/form_statutJuridique.html.twig', array('form' => $form->createView()));
    }


    
    /**
     * @Route ("/editCompanyStatutJuridique/{id}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editCompanyStatutJuridique(Request $request, string $id)
    {
        $companyJuridique = $this->getDoctrine()->getRepository(ParameterCompanyStatutJuridique::class)->find($id);

        $form = $this->createForm(ParameterCompanyStatutJuridiqueType::class, $companyJuridique);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($companyJuridique);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('companyParameter/form_statutJuridique.html.twig', array('form' => $form->createView()));
    }


}
