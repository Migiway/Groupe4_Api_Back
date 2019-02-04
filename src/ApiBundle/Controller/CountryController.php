<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 07/01/2019
 * Time: 10:13
 */

namespace App\ApiBundle\Controller;

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
    * @Route("/new", name="country_new", methods={"GET","POST"})
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
     * @Route ("/edit/{country}", name="country_edit", methods={"PUT"})
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
    * @Route("/list", name="country_list", methods={"GET"})
    */
    public function list (Request $request){

    }

    /**
    * @Route("/delete/{country}", name="country_delete", methods={"DELETE"})
    */
    public function delete(Request $request)
    {

    }

}
