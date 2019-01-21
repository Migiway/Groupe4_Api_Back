<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 07/01/2019
 * Time: 10:13
 */

namespace App\AdminBundle\Controller;

use App\AdminBundle\Form\GraphStyleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\GraphStyle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


/**
 * @Route("/graphStyle")
 */
class GraphStyleController extends AbstractController
{
    /**
     * @Route ("/new")
     * @param Request $request
     */
    public function new(Request $request){
        $graphStyle = new GraphStyle();

        $form = $this->createForm(GraphStyleType::class, $graphStyle);
        $form->add('submit', SubmitType::class, [
            'label' => 'Enregistrer',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($graphStyle);
            $em->flush();
            return $this->render('graphStyle/success.html.twig', array('message' => 'all clear'));
        }

        return $this->render('graphStyle/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/edit/{graphStyle}")
     * @param Request $request
     */
    public function edit (Request $request, GraphStyle $graphStyle){

        $form = $this->createForm(GraphStyleType::class, $graphStyle);

        $form->add('submit', SubmitType::class, [
            'label' => 'Modifier',
            'attr' => ['class' => 'btn btn-default pull-right'],
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($graphStyle);
            $em->flush();
            return $this->render('graphStyle/success.html.twig', array('message' => 'all clear'));
        }

        return $this->render('graphStyle/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/list", name="graphStyle_list")
     */
    public function list (Request $request){

    }



}
