<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 10/12/2018
 * Time: 10:55
 */
namespace App\ApiBundle\Controller;

use App\AdminBundle\Entity\Participate;
use App\AdminBundle\Entity\Contact;
use App\AdminBundle\Entity\Operation;
use App\AdminBundle\Form\ContactType;
use App\AdminBundle\Form\ParticipateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/participate")
 */
class ParticipateController extends AbstractController
{
    /**
     * @Route ("/new", name="participate_new", methods={"GET","POST"})
     * @param Request $request
     */
    public function newApi(Request $request){
        $participate = new Participate();

        $form = $this->createForm(ParticipateType::class, $participate);
        $form->add('submit', SubmitType::class, [
            'label' => 'Enregistrer',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($participate);
            $em->flush();
            return $this->render('participate/success.html.twig', array('message' => 'all clear'));
        }

        return $this->render('participate/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/edit/{participate}", name="participate_edit", methods={"PUT"})
     * @param Request $request
     */
    public function editApi (Request $request, Participate $participate){

        $form = $this->createForm(ParticipateType::class, $participate);

        $form->add('submit', SubmitType::class, [
            'label' => 'Modifier',
            'attr' => ['class' => 'btn btn-default pull-right'],
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($participate);
            $em->flush();
            return $this->render('participate/success.html.twig', array('message' => 'all clear'));
        }

        return $this->render('participate/new.html.twig', array('form' => $form->createView()));
    }
    /**
     * @Route ("/delete", name="participate_delete", methods={"DELETE"})
     * @param Request $request
     */
    public function deleteApi(Request $request)
    {

    }

    /**
     * @Route("/list", name="participate_list", methods={"GET"})
     */
    public function list (Request $request){

    }



}
