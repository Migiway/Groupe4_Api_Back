<?php

namespace App\AdminBundle\Controller;

use App\AdminBundle\Entity\Colors;
use App\AdminBundle\Form\ColorType;
use App\AdminBundle\Form\ParameterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\Parameter;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Reponse;


/**
 * @Route("/parameter")
 * Class ParameterController
 * @package App\Controller
 */
class ParameterController extends AbstractController
{
    /**
     * @Route("/new", name="parameter_new", methods={"GET","POST"})
     */
    public function new(Request $request)
    {
        $param = new Parameter();

        $form = $this->createForm(ParameterType::class, $param);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->redirectToRoute('parameter_list');

        }

        return $this->render('parameter/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/edit/{id}", name="parameter_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Parameter $param)
    {
        $form = $this->createForm(ParameterType::class, $param);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($param);
            $em->flush();
            return $this->redirectToRoute('parameter_list');
        }

        return $this->render('parameter/edit.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/delete/{id}", name="parameter_delete", methods={"GET","POST"})
     */
    public function delete(Request $request)
    {

    }


    /**
     * @Route("/list", name="parameter_list")
     */
    public function list()
    {
        return $this->render('parameter/list.html.twig');
    }


    /**
     * @Route("/color/part", name="body_color_part")
     */
    public function colorpart()
    {
        $col = $this->getDoctrine()->getRepository(Colors::class)->find(1);
        return $this->render('bodycolor/colorpart.html.twig',
            ['Color' => $col]);
    }

    /**
     * @Route("/color/update", name="body_color_update")
     */
    public function coloradd(Request $request)
    {
        $col = $this->getDoctrine()->getRepository(Colors::class)->find(1);
        if ($request->getMethod() == "POST") {
            $em = $this->getDoctrine()->getManager();
            $color = $em->getRepository(Colors::class)->find(1);
//            $color = new Colors();
            $color->setColorsCode($request->get('code'));
            $em->flush();
//            return $this->redirectToRoute('body_color');
        }
        return $this->render('bodycolor/addcolor.html.twig',
            ['Color' => $col]);
    }


}
