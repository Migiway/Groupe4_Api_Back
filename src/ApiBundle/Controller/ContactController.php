<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 10/12/2018
 * Time: 10:55
 */
namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\ContactType;
use App\AdminBundle\Repository\ContactRepository;
use PhpParser\Node\Scalar\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    * @Route("/contactActif", name="contactActif", methods={"GET"})
    */
    public function contactActif()
    {
      $repository = $this->getDoctrine()->getRepository(Contact::class);
      $contactsActif = $repository->findBy(
          ['contact_statut' => 1]
      );
      $contactsActif = count($contactsActif);
      return new JsonResponse(['contactActif' => $contactsActif]);
    }


    /**
     * @Route("/newContacts/{time}", name="newContacts", methods={"GET"})
     */
    public function newContacts($time)
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
        $repository = $this->getDoctrine()->getRepository(Contact::class);
        $newcontact = $repository->newContact($period);

        $period = "-3 year";
        $repository = $this->getDoctrine()->getRepository(Contact::class);
        $pourcentage = $repository->newContact($period);

        $result = $newcontact['nb'];
        $result = intval($result);

        $result2 = $pourcentage['nb'];
        $result2 = intval($result2);

        $PourcentCont = ($result/$result2)*100;

        $PourcentCont = intval($PourcentCont);

        /*$serializer = $this->container->get('serializer');
        $newcontact = $serializer->serialize($result, 'json');*/
        return new JsonResponse(['result' => $result, 'pourcent' => $PourcentCont]);

    }

    /**
     * @Route("/indiceCrm/{time}", name="indiceCrm", methods={"GET"})
     */
    public function indiceCrm($time)
    {
        $period = "";
        switch($time){
            case "3month":
                $period = "-3 month";
                break;
            case "6month":
                $period = "-6 month";
                break;
            case "1year":
                $period = "-1 year";
                break;
            case "2year":
                $period = "-2 year";
                break;
            case "3year":
                $period = "-3 year";
                break;
        }
        $repository = $this->getDoctrine()->getRepository(Contact::class);
        $newcontact = $repository->indice($period);
        $result = $newcontact->execute();


        $contact = $this->getDoctrine()->getRepository(Contact::class)->findAll();
        $totalContact = count($contact);

        $total = ($totalContact / $result[0]['nb'])*100;

        /*$serializer = $this->container->get('serializer');
        $contactpourcent = $serializer->serialize($total, 'json');*/
        return new JsonResponse(['pourcentage' => $total, 'total' => $totalContact]);
    }

    /**
     * @Route("/chart", name="chart", methods={"GET"})
     */
    public function chart()
    {
        $period = "-1 month";
        $repository = $this->getDoctrine()->getRepository(Contact::class);
        $newcontact = $repository->newContact($period);

        $result1 = $newcontact['nb'];
        $result1 = intval($result1);

        $period = "-2 month";
        $repository = $this->getDoctrine()->getRepository(Contact::class);
        $newcontact = $repository->newContact($period);

        $result2 = $newcontact['nb'];
        $result2 = intval($result2);

        $period = "-3 month";
        $repository = $this->getDoctrine()->getRepository(Contact::class);
        $newcontact = $repository->newContact($period);

        $result3 = $newcontact['nb'];
        $result3 = intval($result3);

        $period = "-4 month";
        $repository = $this->getDoctrine()->getRepository(Contact::class);
        $newcontact = $repository->newContact($period);

        $result4 = $newcontact['nb'];
        $result4 = intval($result4);




        /*$serializer = $this->container->get('serializer');
        $contactpourcent = $serializer->serialize($total, 'json');*/
        return new JsonResponse(['month1' => $result1, 'month2' => $result2, 'month3' => $result3, 'month4' => $result4]);
    }

    /**
     * @Route("/chartMaj", name="chartMaj", methods={"GET"})
     */
    public function chartMaj()
    {

        /*$serializer = $this->container->get('serializer');
        $contactpourcent = $serializer->serialize($total, 'json');*/
        return new JsonResponse(['month1' => 0, 'month2' => 2, 'month3' => 10, 'month4' => 8]);
    }

}

