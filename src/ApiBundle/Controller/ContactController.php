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

        $result = $newcontact['nb'];
        $result = intval($result);

        /*$serializer = $this->container->get('serializer');
        $newcontact = $serializer->serialize($result, 'json');*/
        return new JsonResponse(['result' => $result]);

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
        return new Response(['total' => $total]);
    }

}

