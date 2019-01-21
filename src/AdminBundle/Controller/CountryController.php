<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 07/01/2019
 * Time: 10:13
 */

namespace App\AdminBundle\Controller;

use App\AdminBundle\Form\CountryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\Country;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


/**
 * @Route("/country")
 */
class CountryController extends AbstractController
{
    /**
     * @Route ("/new")
     * @param Request $request
     */
    public function new(Request $request){
        $country = new Country();

        $form = $this->createForm(CountryType::class, $country);
        $form->add('submit', SubmitType::class, [
            'label' => 'Enregistrer',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($country);
            $em->flush();
            return $this->render('country/success.html.twig', array('message' => 'all clear'));
        }

        return $this->render('country/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route ("/edit/{country}")
     * @param Request $request
     */
    public function edit (Request $request, Country $country){

        $form = $this->createForm(CountryType::class, $country);

        $form->add('submit', SubmitType::class, [
            'label' => 'Modifier',
            'attr' => ['class' => 'btn btn-default pull-right'],
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($country);
            $em->flush();
            return $this->render('country/success.html.twig', array('message' => 'all clear'));
        }

        return $this->render('country/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/list", name="country_list")
     */
    public function list (Request $request){

    }



}
