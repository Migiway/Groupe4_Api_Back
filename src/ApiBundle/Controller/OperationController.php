<?php

namespace App\ApiBundle\Controller;
use App\AdminBundle\Form\OperationType;
use App\AdminBundle\Entity\Operation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
* @Route("/operation")
* Class CompanyController
* @package App\Controller
*/
class OperationController extends AbstractController
{
    /**
     * @Route("/operationAll", name="operationAll", methods={"GET"})
     */
    public function operationAll()
    {
        $repository = $this->getDoctrine()->getRepository(Operation::class);
        $operation = $repository->findAll();
        $operation = count($operation);
        return new JsonResponse(['operations' => $operation]);
    }

    /**
     * @Route("/emailsAll", name="emailsAll", methods={"GET"})
     */
    public function emailsAll()
    {
        /*$repository = $this->getDoctrine()->getRepository(Operation::class);
        $operation = $repository->findAll();
        $operation = count($operation);
        $serializer = $this->container->get('serializer');
        $operation = $serializer->serialize($operation, 'json');*/
        $newEmails = 32;

        return new JsonResponse(['newEmails' => $newEmails, 'pourcent' => 2]);
    }

    /**
     * @Route("/emails", name="emails", methods={"GET"})
     */
    public function emails()
    {
        /*$repository = $this->getDoctrine()->getRepository(Operation::class);
        $operation = $repository->findAll();
        $operation = count($operation);
        $serializer = $this->container->get('serializer');
        $operation = $serializer->serialize($operation, 'json');*/
        $newEmails = 1254;

        return new JsonResponse(['emails' => $newEmails]);
    }


    /**
     * @Route("/Operation/{time}", name="Operation", methods={"GET"})
     */
    public function operation($time)
    {
        $period = "";
        switch($time){
            case "day":
                $period = "-1 days";
                break;
            case "week":
                $period = "-1 week";
                break;
            case "month":
                $period = "-1 month";
                break;
            case "year":
                $period = "-1 year";
                break;
        }
        $repository = $this->getDoctrine()->getRepository(Operation::class);
        $newcontact = $repository->operation($period);


        $newcontact = intval($newcontact['nb']);

        $period = "-3 year";
        $repository = $this->getDoctrine()->getRepository(Operation::class);
        $pourcentage = $repository->operation($period);

        $result2 = $pourcentage['nb'];
        $result2 = intval($result2);

        $PourcentCont = ($newcontact/$result2)*100;

        $PourcentCont = intval($PourcentCont);

        return new JsonResponse(['newOp' => $newcontact, 'pourcent' => $PourcentCont]);

    }

    /**
     * @Route("/chartOpe", name="chartOpe", methods={"GET"})
     */
    public function chartOpe()
    {
        $period = "-1 month";
        $repository = $this->getDoctrine()->getRepository(Operation::class);
        $newcontact = $repository->operation($period);

        $result1 = $newcontact['nb'];
        $result1 = intval($result1);

        $period = "-2 month";
        $repository = $this->getDoctrine()->getRepository(Operation::class);
        $newcontact = $repository->operation($period);

        $result2 = $newcontact['nb'];
        $result2 = intval($result2);

        $period = "-3 month";
        $repository = $this->getDoctrine()->getRepository(Operation::class);
        $newcontact = $repository->operation($period);

        $result3 = $newcontact['nb'];
        $result3 = intval($result3);

        $period = "-4 month";
        $repository = $this->getDoctrine()->getRepository(Operation::class);
        $newcontact = $repository->operation($period);

        $result4 = $newcontact['nb'];
        $result4 = intval($result4);




        /*$serializer = $this->container->get('serializer');
        $contactpourcent = $serializer->serialize($total, 'json');*/
        return new JsonResponse(['month1' => $result1, 'month2' => $result2, 'month3' => $result3, 'month4' => $result4]);
    }

    /**
     * @Route("/chartMail", name="chartMail", methods={"GET"})
     */
    public function chartMail()
    {

        /*$serializer = $this->container->get('serializer');
        $contactpourcent = $serializer->serialize($total, 'json');*/
        return new JsonResponse(['month1' => 35, 'month2' => 137, 'month3' => 26, 'month4' => 251]);
    }


}
