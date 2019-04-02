<?php

namespace App\AdminBundle\Controller;
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

/**
* @Route("/operation")
* Class CompanyController
* @package App\Controller
*/
class OperationController extends AbstractController
{
  /**
  * @Route("/new", methods = {"GET","POST"})
  * @param Request $request
  *@return \Symfony\Component\HttpFoundation\Response
  */
  public function new(Request $request){
      $operation = new Operation();
      $form = $this->createForm(OperationType::class, $operation);
      $form->add('submit', SubmitType::class, [
     'label' => 'Ajouter',
     'attr' => ['class' => 'btn btn-default pull-right'],
   ]);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
     {
       $em = $this->getDoctrine()->getManager();
       $em->persist($operation);
       $em->flush();
       return $this->redirectToRoute('operation_list');
     }


      /*if($request->isMethod('POST')){
                $this->newPost($request);
        }*/

        return $this->render('operation/new.html.twig', array(
            'form' => $form->createView(),
        ));

      }

      /**
     * @Route("", methods={"POST"})
     * @param Request $request
     */
  public function newPost(Request $request, SerializerInterface $serializer){

    $operation = new operation();

    $form = $this->createForm(OperationType::class, $operation);
    $form->handleRequest($request);

    $em = $this->getDoctrine()->getManager();
    $em->persist($operation);
    $em->flush();

    $JSON = $serializer->serrialize(
       $company,
       'JSON',
       ['Groups=["light"]']
     );
     $response = new Response();
     $response->setContent($JSON);
     $response->headers->set('Content-type','application/JSON');
     return $response;



    /*if ($form->isValid()) {
      return $this->redirectToRoute('operation_list');
        }*/


    }


    /**
    * @Route("", methods={"PUT"})
    * @param Request $request
    */
    public function editApi(){
    }

    /**
    * @Route("", methods={"DELETE"})
    * @param Request $request
    */
    public function deleteApi(){
    }

    /**
    * @Route("/edit/{operation}")
    * @param Request $request
    */
    public function edit(Request $request, Operation $operation){
      $form = $this->createForm(OperationType::class, $operation);
      $form->add('submit', SubmitType::class, [
        'label' => 'Modifier',
        'attr' => ['class' => 'btn btn-default pull-right'],
      ]);

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid())
      {
        $em = $this->getDoctrine()->getManager();
        $em->persist($operation);
        $em->flush();
        return $this->redirectToRoute('operation_list');
      }

      return $this->render('operation/new.html.twig', array('form' => $form->createView()));
    }

    /**
    * @Route("/delete/{id}")
    * @param Request $request
    */
    public function delete(Request $request){
    }

    /**
     * @Route("/list", name="operation_list")
     * @param Request $request
     */
    public function list(Request $request){
      $operations = $this->getDoctrine()
      ->getRepository(Operation::class)
      ->findAll();

      return $this->render('operation/list.html.twig', array(
        'operations' => $operations
      ));
    }
}
