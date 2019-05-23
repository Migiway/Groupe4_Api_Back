<?php

namespace App\AdminBundle\Controller;

use App\AdminBundle\Entity\EmailTemplate;
use App\AdminBundle\Form\EmailTemplateType;
use App\AdminBundle\Form\OperationType;
use App\AdminBundle\Entity\Operation;
use App\AdminBundle\Entity\User;
use App\Library\Mailjet\Client;
use App\Library\Mailjet\Resources;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/operation")
 * Class OperationController
 * @package App\Controller
 */
class OperationController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_operation_list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $operations = $this->getDoctrine()
            ->getRepository(Operation::class)
            ->findAll();

        $totalOperations = count($operations);

        return $this->render('operation/list.html.twig', array(
            'operations' => $operations,
            'totalOperations' => $totalOperations
        ));
    }


    /**
     * @Route("/new", methods = {"GET","POST"}, name="app_admin_operation_new")
     * @ParamConverter("obj", class="AdminBundle:Operation")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request, $obj = null)//permet egalement l'edition
    {
        if ($obj === null) {
            $obj = new Operation();
        }

        $form = $this->createForm(OperationType::class, $obj);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $obj = $form->getData();
            $obj->setOperationAuthor($this->getUser());

            $this->getDoctrine()->getManager()->persist($obj);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_admin_operation_list');
        }

        $arr = array(
            'form' => $form->createView()
        );

        return $this->render('operation/new.html.twig', $arr);
    }

//    /**
//     * @Route("/edit/{id}", name="app_admin_operation_edit")
//     * @param Request $request
//     * @return \Symfony\Component\HttpFoundation\Response
//     */
//    public function edit(Request $request, Operation $operation)
//    {
//        $form = $this->createForm(OperationType::class, $operation);
//
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $obj = $form->getData();
//            $obj->setOperationAuthor($this->getUser());
//
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($operation, $obj);
//            $em->flush();
//            return $this->redirectToRoute('app_admin_operation_list');
//        }
//
//        return $this->render('operation/edit.html.twig', array('form' => $form->createView()));
//    }

    /**
     * @Route("/edit/{id}", name="app_admin_operation_edit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request, Operation $operation)
    {
        $form = $this->createForm(OperationType::class, $operation);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $obj = $form->getData();
            $obj->setOperationAuthor($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($operation, $obj);
            $em->flush();
            return $this->redirectToRoute('app_admin_operation_list');
        }

        return $this->render('operation/edit.html.twig', array(
            'form' => $form->createView(),
            'operationId' => $request->get('id')));
    }

    /**
     * @Route("/delete/{id}", name="app_admin_operation_delete")
     * @ParamConverter("obj", class="AdminBundle:Operation")
     */
    public function delete(Request $request, $obj)
    {
        $this->getDoctrine()->getManager()->remove($obj);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('app_admin_operation_list');
    }

    /**
     * @Route("/delete-select", name="delete_select")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete_select(Request $request)
    {
        $idOperations = $_POST['operations'];
        $arr = explode(',', $idOperations);
        $totalId = count($arr);
        for ($i = 0; $i < $totalId; $i++) {
            $uneOperation = $this->getDoctrine()->getRepository(Operation::class)->findBy(['id' => $arr[$i]]);
            $em = $this->getDoctrine()->getManager();
            $em->remove($uneOperation[0]);
            $em->flush();
        }
        return $this->redirectToRoute('app_admin_operation_list', array('message' => 'all clear'));
    }

    /**
     * @Route ("/email-template/{id}", name="emailTemplateAndPage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function emailTemplate(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $operationId = $request->get('id');

        $emailTemplate = $em->getRepository('AdminBundle:EmailTemplate')->findOneBy(array('operation' => $operationId));
        if (!$emailTemplate) {
            $emailTemplate = new EmailTemplate();
        }

        $form = $this->createForm(EmailTemplateType::class, $emailTemplate);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $operation = $em->getRepository('AdminBundle:Operation')->find($operationId);
            $emailTemplate->setOperation($operation);
            $em->persist($emailTemplate);
            $em->flush();
            return $this->redirectToRoute('app_admin_operation_edit', array('operationId' => $operationId));
        }

        return $this->render('operation/email_template.html.twig', array('form' => $form->createView(), 'operationId' => $operationId));
    }

    /**
     * @Route("/send-email/{id}", name="sendEmailView")
     * @param Request $request
     * @return Response
     */
    public function sendEmailView(Request $request)
    {
        $operationId = $request->get('id');
        $emailTemplate = $this->getDoctrine()->getRepository('AdminBundle:EmailTemplate')
            ->findOneBy(array('operation' => $operationId));
        if (!$emailTemplate) {
            return $this->redirectToRoute('emailTemplateAndPage', array('id' => $operationId));
        }

        $contactsOptions = '';
        $contactFields = [
            'contact_codeClient' => 'Client Code',
            'contact_genre' => 'Genre',
            'contact_nivDecision' => 'Niv Decision',
            'contact_metier' => 'Metier',
            'contact_opeSource' => 'opeSource',
        ];

        foreach ($contactFields as $key => $val) {
            $contactsOptions .= "<option value='{$key}'>{$val}</option>";
        }

        $companyOptions = '';
        $companyFields = [
            'companyCode' => 'Code',
            'companyCity' => 'City',
            'companySiret' => 'Siret',
            'companyCodeNaf' => 'Code Naf',
            'companySource' => 'Source',
            'companyPostcode' => 'Code postal',
        ];

        foreach ($companyFields as $key => $val) {
            $companyOptions .= "<option value='{$key}'>{$val}</option>";
        }

        return $this->render('operation/send_email.html.twig', array(
            'contactsOptions' => $contactsOptions,
            'companyOptions' => $companyOptions,
            'operationId' => $operationId
        ));
    }

    /**
     * @Route("/get-email-list", name="getEmailList")
     * @param Request $request
     */
    public function getEmailsFromDataArray(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $filterType = $request->get('filterType');
        $filterFields = $request->get('filterFields');
        $filterValue = $request->get('filterValue');

        if ($filterType == 'contact') {
            $emails = $em->getRepository('AdminBundle:Contact')->getEmailBySearch($filterFields, $filterValue);
        } else {
            $emails = $em->getRepository('AdminBundle:Company')->getEmailBySearch($filterFields, $filterValue);
        }

        if ($emails) {
            $emails = json_encode($emails);
        } else {
            $emails = 'no';
        }

        return new Response($emails);
    }

    /**
     * @Route("/send-email-list", name="sendEmailList")
     * @param Request $request
     */
    public function sendEmailsFromDataArray(Request $request, Resources $resources)
    {
        $emails = explode(',', $request->get('emails'));
        $list = [];
        foreach ($emails as $email) {
            $list[]['Email'] = $email;
        }
var_dump($list);
        $emailTemplate = $this->getDoctrine()->getRepository('AdminBundle:EmailTemplate')
            ->findOneBy(array('operation' => $request->get('operationId')));

        $mj = new Client('861f8e838d2e797517139391da55b6ca', 'fc2464fecdb0be10a03033d47390897e', true, ['version' => 'v3.1']);

        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "contact@smartleads.com",
                        'Name' => "Mailjet Pilot"
                    ],
                    'To' => $list,
                    'Subject' => $emailTemplate->getEmailSubject(),
                    'TextPart' => $emailTemplate->getEmailBody(),
//                    'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!"
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        var_dump($response);die;
        if ($response->getStatus() == 200) {
            $msg = 'Email bien envoyé';
            $session = 'email_sent_true';
        } else {
            $msg = 'Un problème est survenue.';
            $session = 'email_sent_false';
        }

        $this->get('session')->getFlashBag()->add($session, $msg);

        return $this->redirectToRoute('sendEmailView');
    }

}
