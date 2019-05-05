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
use App\AdminBundle\Entity\ParameterNoteEcheance;
use App\AdminBundle\Entity\ParameterNoteCategorie;
use App\AdminBundle\Entity\ParameterNotePriorite;
use App\AdminBundle\Entity\ParameterContactPouvoir;
use App\AdminBundle\Entity\ParameterContactMetier;
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
use App\AdminBundle\Form\ParameterNoteEcheanceType;
use App\AdminBundle\Form\ParameterNoteCategorieType;
use App\AdminBundle\Form\ParameterNotePrioriteType;
use App\AdminBundle\Form\ParameterContactPouvoirType;
use App\AdminBundle\Form\ParameterContactMetierType;

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

        //Paramètre partie note
        $noteEcheance           = $this->getDoctrine()->getRepository(ParameterNoteEcheance::class)->findAll();
        $noteCategorie          = $this->getDoctrine()->getRepository(ParameterNoteCategorie::class)->findAll();
        $notePriorite           = $this->getDoctrine()->getRepository(ParameterNotePriorite::class)->findAll();

        //Paramètre partie contact
        $contactPouvoir         = $this->getDoctrine()->getRepository(ParameterContactPouvoir::class)->findAll();
        $contactMetier          = $this->getDoctrine()->getRepository(ParameterContactMetier::class)->findAll();

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
            'noteEcheance'              => $noteEcheance,
            'noteCategorie'             => $noteCategorie,
            'notePriorite'              => $notePriorite,
            'contactPouvoir'            => $contactPouvoir,
            'contactMetier'             => $contactMetier,


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
     * @Route ("/new-company-CA")
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
     * @Route ("/edit-company-CA/{id}")
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
     * @Route ("/new-company-effectif")
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
     * @Route ("/edit-company-effectif/{id}")
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
     * @Route ("/new-company-secteur")
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
     * @Route ("/edit-company-secteur/{id}")
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
     * @Route ("/new-company-statut")
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
     * @Route ("/edit-company-statut/{id}")
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
     * @Route ("/new-company-statut-juridique")
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
     * @Route ("/edit-company-statut-juridique/{id}")
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


    /**
     * @Route ("/new-note-echeance")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newNoteEcheance(Request $request)
    {
        $noteEcheance = new ParameterNoteEcheance();

        $form = $this->createForm(ParameterNoteEcheanceType::class, $noteEcheance);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($noteEcheance);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('noteParameter/form_echeance.html.twig', array('form' => $form->createView()));
    }


    
    /**
     * @Route ("/edit-note-echeance/{id}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editNoteEcheance(Request $request, string $id)
    {
        $noteEcheance = $this->getDoctrine()->getRepository(ParameterNoteEcheance::class)->find($id);

        $form = $this->createForm(ParameterNoteEcheanceType::class, $noteEcheance);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($noteEcheance);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('noteParameter/form_echeance.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/new-note-categorie")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newNoteCategorie(Request $request)
    {
        $noteCategorie = new ParameterNoteCategorie();

        $form = $this->createForm(ParameterNoteCategorieType::class, $noteCategorie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($noteCategorie);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('noteParameter/form_categorie.html.twig', array('form' => $form->createView()));
    }


    
    /**
     * @Route ("/edit-note-categorie/{id}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editNoteCategorie(Request $request, string $id)
    {
        $noteCategorie = $this->getDoctrine()->getRepository(ParameterNoteCategorie::class)->find($id);

        $form = $this->createForm(ParameterNoteCategorieType::class, $noteCategorie);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($noteCategorie);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('noteParameter/form_categorie.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/new-note-priorite")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newNotePriorite(Request $request)
    {
        $notePriorite = new ParameterNotePriorite();

        $form = $this->createForm(ParameterNotePrioriteType::class, $notePriorite);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($notePriorite);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('noteParameter/form_priorite.html.twig', array('form' => $form->createView()));
    }


    
    /**
     * @Route ("/edit-note-priorite/{id}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editNotePriorite(Request $request, string $id)
    {
        $notePriorite = $this->getDoctrine()->getRepository(ParameterNotePriorite::class)->find($id);

        $form = $this->createForm(ParameterNotePrioriteType::class, $notePriorite);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($notePriorite);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('noteParameter/form_priorite.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/new-contact-pouvoir")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newContactPouvoir(Request $request)
    {
        $notePouvoir = new ParameterContactPouvoir();

        $form = $this->createForm(ParameterContactPouvoirType::class, $notePouvoir);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($notePouvoir);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('contactParameter/form_pouvoir.html.twig', array('form' => $form->createView()));
    }


    
    /**
     * @Route ("/edit-contact-pouvoir/{id}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editContactPouvoir(Request $request, string $id)
    {
        $notePouvoir = $this->getDoctrine()->getRepository(ParameterContactPouvoir::class)->find($id);

        $form = $this->createForm(ParameterContactPouvoirType::class, $notePouvoir);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($notePouvoir);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('contactParameter/form_pouvoir.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/new-contact-metier")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newContactMetier(Request $request)
    {
        $noteMetier = new ParameterContactMetier();

        $form = $this->createForm(ParameterContactMetierType::class, $noteMetier);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($noteMetier);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('contactParameter/form_metier.html.twig', array('form' => $form->createView()));
    }


    
    /**
     * @Route ("/edit-contact-metier/{id}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editContactMetier(Request $request, string $id)
    {
        $noteMetier = $this->getDoctrine()->getRepository(ParameterContactMetier::class)->find($id);

        $form = $this->createForm(ParameterContactMetierType::class, $noteMetier);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($noteMetier);
            $em->flush();
            return $this->redirectToRoute('identite_index');
        }

        return $this->render('contactParameter/form_metier.html.twig', array('form' => $form->createView()));
    }
}
