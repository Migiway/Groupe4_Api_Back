<?php
namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\JobType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\AdminBundle\Entity\Job;
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


/**
* @Route("/job")
* Class JobController
* @package App\Controller
*/
class JobController extends AbstractController
{
	/**
	* @Route("/new", name="job_new", methods={"GET","POST"})
	*/
    public function new(Request $request)
    {
    	$job = new Job();

        $form = $this->createForm(JobType::class, $job);

		$form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid())
        {

            $task = $form->getData();

        	$entityManager = $this->getDoctrine()->getManager();
        	$entityManager->persist($task);
        	$entityManager->flush();
            return $this->redirectToRoute('job_list');

        }

        return $this->render('job/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/edit/{id}", name="job_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Job $job)
    {
        $form = $this->createForm(JobType::class, $job);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
           {
             $em = $this->getDoctrine()->getManager();
             $em->persist($job);
             $em->flush();
             return $this->redirectToRoute('job_list');
           }

           return $this->render('job/edit.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/delete/{id}", name="job_delete", methods={"GET","POST"})
     */
    public function delete(Request $request)
    {

    }


    /**
     * @Route("/list", name="job_list")
     */
    public function list()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository(Job::class);
        $list = $repository->allJob();


        return $this->render('job/list.html.twig', array('lalist' => $list)); // On
    }


}
