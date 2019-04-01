<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 10/12/2018
 * Time: 10:55
 */
namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;

/**
* @Route("/contact")
*/
class ContactController extends AbstractController
{
    /**
    * @Route("/new", name="contact_new", methods={"GET","POST"})
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
     * @Route ("/edit/{contact}", name="contact_edit", methods={"PUT"})
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
    * @Route("/list", name="contact_list", methods={"GET"})
    */
    public function list (Request $request){

    }

    /**
    * @Route("/delete/{contact}", name="contact_delete", methods={"DELETE"})
    */
    public function delete(Request $request)
    {

    }

    /**
    * @Route("/contactActif", name="contactActif", methods={"GET"})
    */
    public function contactActif()
    {
      $repository = $this->getDoctrine()->getRepository(Contact::class);
      $contactsActif = $repository->findBy(
          ['contact_statut' => 1]
      );
      $contactsActif = count($contactsActif);
      $serializer = $this->container->get('serializer');
      $contactsActif = $serializer->serialize($contactsActif, 'json');
      return new Response($contactsActif);
    }
}
