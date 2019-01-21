<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 10/12/2018
 * Time: 10:55
 */
namespace App\AdminBundle\Controller;

use App\AdminBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/contact")
 */
class ContactController extends AbstractController
{
    /**
     * @Route ("/new")
     * @param Request $request
     */
    public function new(Request $request){
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->add('submit', SubmitType::class, [
            'label' => 'Enregistrer',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->render('contact/success.html.twig', array('message' => 'all clear'));
        }

        return $this->render('contact/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/edit/{contact}")
     * @param Request $request
     */
    public function edit (Request $request, Contact $contact){

        $form = $this->createForm(ContactType::class, $contact);

        $form->add('submit', SubmitType::class, [
            'label' => 'Modifier',
            'attr' => ['class' => 'btn btn-default pull-right'],
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->render('contact/success.html.twig', array('message' => 'all clear'));
        }

        return $this->render('contact/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/list", name="country_list")
     */
    public function list (Request $request){

    }



}
