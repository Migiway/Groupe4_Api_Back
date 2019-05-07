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
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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
            /*$file = $form->get('contact_photo');
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            try {
                $file->move(
                    $this->getParameter('photo_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }

            $contact->setContactPhoto($fileName);*/

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->redirectToRoute('contact_list', array('message' => 'all clear'));
        }

        return $this->render('contact/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/edit/{contact}", methods={"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit (Request $request, contact $contact){


        $contact_form = $this->getDoctrine()
            ->getRepository(contact::class)
            ->find($contact);

        $form = $this->createForm(ContactType::class, $contact_form);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact_form->setContactMisAJour(new \DateTime('now'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact_form);
            $em->flush();

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

        $count = $this->getDoctrine()
            ->getRepository(Contact::class)
            ->countall();

        return $this->render('contact/list.html.twig', array(
            'contacts' => $contacts, 'nb_contact' => $count
        ));
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

    /**
     * @Route("/delete-select", name="delete_select")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete_select(Request $request)
    {
        $idContact = $_POST['contacts'];
        $arr = explode(',', $idContact);
        $totalId    = count($arr);
        for ($i=0; $i < $totalId ; $i++) {
            $uncontact = $this->getDoctrine()->getRepository(Contact::class)->findBy(['id' => $arr[$i]]);
            $em = $this->getDoctrine()->getManager();
            $em->remove($uncontact[0]);
            $em->flush();
        }
        return $this->redirectToRoute('contact_list', array('message' => 'all clear'));
    }

}
