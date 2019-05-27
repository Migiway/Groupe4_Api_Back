<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 10/12/2018
 * Time: 10:55
 */
namespace App\AdminBundle\Controller;

use App\AdminBundle\Entity\Company;
use App\AdminBundle\Form\ContactType;
use App\AdminBundle\Form\NoteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\Contact;
use App\AdminBundle\Entity\Postes;
use App\AdminBundle\Entity\Note;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;
use League\Csv\CannotInsertRecord;

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
        $postes = new Postes();


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
            $id = $contact->getId();

            $postes->setContactId($id);
            $postes->setCompanyId($contact_form->getCompanyId());
            $postes->setUserId($contact_form->getUserId());
            $postes->setMetierId($contact_form->getMetierId());
            $postes->setPouvoirId($contact_form->getPouvoirId());
            $postes->setPostesMetier($contact_form->getContactMetier());
            $postes->setPostesCommentaire($contact_form->getContactCommentaire());
            $postes->setPostesTelFixe($contact_form->getContactTelFixe());
            $postes->setPostesTelStandard($contact_form->getContactTelStandard());
            $em->persist($postes);
            $em->flush();
            return $this->redirectToRoute('contact_list');
        }
        $personne = $this->getDoctrine()
            ->getRepository(Contact::class)
            ->find($contact);

        $id = $contact->getId();

        $postes = $this->getDoctrine()
            ->getRepository(Postes::class)
            ->findBy(
                ['contact_id' => $id]
            );

        //Formulaire note
        $note = new Note();

        $formNote = $this->createForm(NoteType::class, $note);

        $formNote->handleRequest($request);

        if ($formNote->isSubmitted() && $formNote->isValid()) {
            $note->setRelType('contact');
            $note->setRelId($id);
            $em = $this->getDoctrine()->getManager();
            $em->persist($note);
            $em->flush();
        }

        //liste note
        $noteListe = $this->getDoctrine()->getRepository(Note::class)->findBy(['rel_id' => $id,'rel_type' => 'contact']);

        $totalNote = count($noteListe);

        return $this->render('contact/edit.html.twig', array('form' => $form->createView(),'formNote' => $formNote->createView(), 'personne' => $personne, 'postes' => $postes,'noteListe' => $noteListe,'totalNote' => $totalNote ));
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
     * @Route("/delete/postes/{postes}")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete_postes(Request $request, Postes $postes)
    {
        $unPostes = $this->getDoctrine()->getRepository(Postes::class)->find($postes);
        $em = $this->getDoctrine()->getManager();
        $em->remove($unPostes);
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

        // IMPORT CSV
        $formcsv = $this->createFormBuilder()
            ->add('contact_import', FileType::class, ['label' => false])
            ->getForm();

        $formcsv->handleRequest($request);

        if ($formcsv->isSubmitted() && $formcsv->isValid()) {
            $task = $formcsv->getData();
            if (!is_null($task)) {
                $uploaddir = '../public/assests/csv/';
                /*$path = $this->get('kernel')->getProjectDir() . '/public/';
                $path .= "assests/csv/";*/
                $uploadfile = $uploaddir . basename($_FILES['form']['name']["contact_import"]);
                move_uploaded_file($_FILES['form']['tmp_name']["contact_import"], $uploadfile);

                $name_file = $_FILES['form']['name']["contact_import"];
                $csv = Reader::createFromPath('../public/assests/csv/'.$name_file.'', 'r');
                $csv->setHeaderOffset(0); //set the CSV header offset

                $stmt = (new Statement())
                    ->offset(0)
                    ->limit(100);
                $records = $stmt->process($csv);
                foreach ($records as $record) {

                    $contact = new Contact();

                    $contact->setContactNom($record['Last Name']);
                    $contact->setContactPrenom($record['First Name']);
                    $contact->setContactEmail($record['Email Address']);
                    $contact->setContactMetier($record['Position']);
                    $num1 = rand(0, 99999);
                    $contact->setContactCodeClient($num1);
                    $contact->setContactGenre(true);

                    $companies = $this->getDoctrine()
                        ->getRepository(Company::class)
                        ->findBy(
                            ['companyName' => $record['Company']]
                        );

                    if (is_null($companies) || empty($companies)) {
                        $company = new Company();
                        $num2 = rand(0, 99999);
                        $company->setCompanyCode($num2);
                        $company->setCompanyName($record['Company']);
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($company);
                        $em->flush();
                        $contact->setCompanyId($company);
                    } else {
                        foreach ($companies as $company) {
                            $contact->setCompanyId($company);
                        }
                    }

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($contact);
                    $em->flush();
                    /*dump($contact);
                    dump($record);*/
                }


            }

        }

        // FIN IMPORT CSV




        $contacts = $this->getDoctrine()
            ->getRepository(Contact::class)
            ->findAll();

        $count = $this->getDoctrine()
            ->getRepository(Contact::class)
            ->countall();

        return $this->render('contact/list.html.twig', array(
            'contacts' => $contacts, 'nb_contact' => $count, 'form' => $formcsv->createView(),
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

    /**
     * @Route("/export", name="export_contact")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function export_contact(Request $request)
    {

        $contactscsv = $this->getDoctrine()
            ->getRepository(Contact::class)
            ->findAll();


        $stack = array();


        foreach ($contactscsv as $con) {

            $test = [$con->getContactNom(), $con->getContactPrenom(), $con->getContactEmail(), $con->getCompanyId(), $con->getContactMetier()];
            array_push($stack, $test);

        }

        $writer = Writer::createFromFileObject(new \SplTempFileObject());
        $writer->insertAll($stack);
        $writer->output('contact.csv');
        //important
        dump($stack);
        //important

        return $this->redirectToRoute('contact_list', array('message' => 'all clear'));


    }

}

