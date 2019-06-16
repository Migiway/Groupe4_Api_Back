<?php
namespace App\ApiBundle\Controller;

use App\AdminBundle\Entity\ParameterTeamDepartement;
use App\AdminBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\User;
use App\AdminBundle\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;	
use Symfony\Component\HttpFoundation\Reponse;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
* @Route("/user")
* Class UserController
* @package App\Controller
*/
class UserController extends AbstractController
{

    /**
	* @Route("/new", name="user_post", methods={"POST"})
	*/
    public function newApi(Request $request)
    {
    	/*SerializeInterface $serializer  -^ */
    	$user = new User();

        $form = $this->createForm(UserType::class, $user);

    	$form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
        	$task = $form->getData();
        	$entityManager = $this->getDoctrine()->getManager();
        	$entityManager->persist($task);
        	$entityManager->flush();    
        }

        /*$json = $serializer->Serialize(
    		$user,
    		'JSON',
    		['Groups'=>["light"]]
    	);
    	
    	$response = new response();
    	$response->setContent($json);
    	$response->headers->set('Content-type', 'application/JSON');*/

    }


//    /**
//     * @Route("/edit/{id}", name="user_edit", methods={"PUT"})
//     */
//    public function editApi(Request $request)
//    {
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid())
//        {
//            return $this->redirectToRoute('list.html.twig');
//        }
//
//        return $this->render('User/new.html.twig', array('form' => $form->createView()));
//    }

    /**
     * @Route("/usersAll", name="usersAll", methods={"GET"})
     */
    public function usersAll()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $result = $repository->findAll();

        $test = array();

        foreach ($result as $res) {
            $repository = $this->getDoctrine()->getRepository(Contact::class);
            $contactBy = $repository->findBy(['user_id' => $res->getId()]);

            $contactBy = count($contactBy);


            $data = array(
                "nom" => $res->getUserLastName(),
                "prenom" => $res->getUserFirstName(),
                "img_url" => $res->getImgUrl(),
                'contacts' => $contactBy,
            );
            array_push($test, $data);
        }

        return new JsonResponse(['users' => $test]);
    }

    /**
     * @Route("/region", name="region", methods={"GET"})
     */
    public function region()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $result = $repository->findAll();

        $test = array();


        foreach ($result as $res) {

                $repository = $this->getDoctrine()->getRepository(ParameterTeamDepartement::class);
                $reg = $repository->findBy(['id' => $res->getDepartement()->getId()]);

                foreach ($reg as $re) {

                    $data = array(
                        "region" => $re->getLibelle(),

                    );
                    array_push($test, $data);
            }


        }

        return new JsonResponse(['region' => $test]);
    }


}
