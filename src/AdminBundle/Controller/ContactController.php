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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request){
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->redirectToRoute('contact_list', array('message' => 'all clear'));
        }

        return $this->render('contact/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/edit/{contact}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit (Request $request, Contact $contact){

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->render('contact/success.html.twig', array('message' => 'all clear'));
        }
        $personne = $this->getDoctrine()
            ->getRepository(Contact::class)
            ->find($contact);


        return $this->render('contact/edit.html.twig', array('form' => $form->createView(), 'personne' => $personne));
    }

    /**
     * @Route("/delete/{contact}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete(Request $request, Contact $contact)
    {
        $unContact = $this->getDoctrine()->getRepository(Contact::class)->find($contact);
        $em = $this->getDoctrine()->getManager();
        $em->remove($unContact);
        $em->flush();

        return $this->redirectToRoute('contact_list', array('message' => 'all clear'));

    }

    /**
     * @Route("/list", name="contact_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function list(Request $request)
    {
        $contacts = $this->getDoctrine()
            ->getRepository(Contact::class)
            ->findAll();

        return $this->render('contact/list.html.twig', array(
            'contacts' => $contacts
        ));
    }

}
