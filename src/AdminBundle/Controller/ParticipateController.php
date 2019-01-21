<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 10/12/2018
 * Time: 10:55
 */
namespace App\AdminBundle\Controller;

use App\AdminBundle\Entity\Participate;
use App\AdminBundle\Entity\Contact;
use App\AdminBundle\Entity\Operation;
use App\AdminBundle\Form\ContactType;
use App\AdminBundle\Form\ParticipateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/participate")
 */
class ParticipateController extends AbstractController
{
    /**
     * @Route ("/new")
     * @param Request $request
     */
    public function new(Request $request){
        $participate = new Participate();

        $form = $this->createForm(ParticipateType::class, $participate);
        $form->add('submit', SubmitType::class, [
            'label' => 'Enregistrer',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($participate);
            $em->flush();
            return $this->render('participate/success.html.twig', array('message' => 'all clear'));
        }

        return $this->render('participate/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/edit/{participate}")
     * @param Request $request
     */
    public function edit (Request $request, Participate $participate){

        $form = $this->createForm(ParticipateType::class, $participate);

        $form->add('submit', SubmitType::class, [
            'label' => 'Modifier',
            'attr' => ['class' => 'btn btn-default pull-right'],
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($participate);
            $em->flush();
            return $this->render('participate/success.html.twig', array('message' => 'all clear'));
        }

        return $this->render('participate/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/list", name="participate_list")
     */
    public function list (Request $request){

    }



}
