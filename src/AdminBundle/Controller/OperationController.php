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

    /**
     * @Route("/edit/{id}", name="app_admin_operation_edit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request, Operation $operation)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(OperationType::class, $operation);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $obj = $form->getData();
            $obj->setOperationAuthor($this->getUser());

            $em->persist($operation, $obj);
            $em->flush();
            return $this->redirectToRoute('app_admin_operation_list');
        }

        $operation = $em->getRepository('AdminBundle:Operation')->find($request->get('id'));
        /*        dump($operation);die;
        */
        return $this->render('operation/edit.html.twig', array(
            'form' => $form->createView(),

            'operationId' => $request->get('id'),
            'operation' => $operation,
            'totalEmails' => $this->getTotalSendEmailCount($request->get('id'))));
    }

    function getTotalSendEmailCount($operationId)
    {
        $operation = $this->getDoctrine()->getRepository('AdminBundle:Operation')->find($operationId);
        $emailDetail = $operation->getSendEmailDetail();
        if ($emailDetail) {
            return $emailDetail['totalEmails'];
        }
        return 0;
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

        $operation = $em->getRepository('AdminBundle:Operation')->find($operationId);
        $emailTemplate->setOperation($operation);

        $form = $this->createForm(EmailTemplateType::class, $emailTemplate);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($emailTemplate);
            $em->flush();
            return $this->redirectToRoute('app_admin_operation_edit', array('id' => $operationId));
        }

        return $this->render('operation/email_template.html.twig', array(
            'form' => $form->createView(),
            'operationId' => $operationId,
            'operation' => $operation,
            'totalEmails' => $this->getTotalSendEmailCount($operationId)
        ));
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
            'contact_codeClient' => 'Code',
            'contact_genre' => 'Genre',
            'contact_statut' => 'Status',
            'contact_nivDecision' => 'Niv Decision',
            'contact_metier' => 'Metier',
        ];

        foreach ($contactFields as $key => $val) {
            $contactsOptions .= "<option value='{$key}'>{$val}</option>";
        }

        $companyOptions = '';
        $companyFields = [
            'companyCode' => 'Code',
            '$companyCategory' => 'Categorie',
            'companyCity' => 'City',
            'companyPostcode' => 'Code postal',
            'companyStatus' => 'Status',
            'companySource' => 'Source',

        ];

        foreach ($companyFields as $key => $val) {
            $companyOptions .= "<option value='{$key}'>{$val}</option>";
        }

        $operation = $this->getDoctrine()->getRepository('AdminBundle:Operation')->find($operationId);

        return $this->render('operation/send_email.html.twig', array(
            'contactsOptions' => $contactsOptions,
            'companyOptions' => $companyOptions,
            'operationId' => $operationId,
            'operation' => $operation,
            'totalEmails' => $this->getTotalSendEmailCount($operationId),
            'emailsList' => $operation->getSendEmailDetail()
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

        $em = $this->getDoctrine()->getManager();
        $emailTemplate = $em->getRepository('AdminBundle:EmailTemplate')
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

        if ($response->getStatus() == 200) {
            $emailDataArray = array(
                'totalEmails' => count($emails),
                'totalContactEmails' => $request->get('contactEmails'),
                'totalCompanyEmails' => $request->get('companyEmails'),
                'emailsList' => $request->get('emailsHtml')
            );

            $operation = $em->getRepository('AdminBundle:Operation')->find($request->get('operationId'));
            $operation->setSendEmailDetail($emailDataArray);
            $em->flush();

            $msg = 'Email bien envoyé';
            $session = 'email_sent_true';
        } else {
            $msg = 'Un problème est survenue.';
            $session = 'email_sent_false';
        }

        $this->get('session')->getFlashBag()->add($session, $msg);

        return $this->redirectToRoute('sendEmailView', array('id' => $request->get('operationId')));

    }

}
