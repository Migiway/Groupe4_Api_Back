<?php

namespace App\ApiBundle\Controller;
use App\AdminBundle\Form\OperationType;
use App\AdminBundle\Entity\Operation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        $serializer = $this->container->get('serializer');
        $operation = $serializer->serialize($operation, 'json');
        return new Response($operation);
    }

    /**
     * @Route("/emailsAll", name="emailsAll", methods={"GET"})
     */
    public function emailsAll()
    {
        $repository = $this->getDoctrine()->getRepository(Operation::class);
        $operation = $repository->findAll();
        $operation = count($operation);
        $serializer = $this->container->get('serializer');
        $operation = $serializer->serialize($operation, 'json');
        return new Response($operation);
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
        $result = $newcontact->execute();

        $serializer = $this->container->get('serializer');
        $newcontact = $serializer->serialize($result, 'json');
        return new Response($newcontact);

    }

}
