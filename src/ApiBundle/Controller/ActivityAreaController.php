<?php

namespace App\ApiBundle\Controller;

use App\AdminBundle\Form\ActivityAreaType;
use App\AdminBundle\Entity\ActivityArea;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Serializer\SerializerInterface;

/**
* @Route("/activityArea")
*/
class ActivityAreaController extends AbstractController
{
  /**
  * @Route("/new", name="activityArea_new", methods={"GET","POST"})
  * @param Request $request
  */
  public function newApi(Request $request, SerializerInterface $serializer)
  {

  }

  /**
   * @Route("/edit", name="activityArea_edit", methods={"PUT"})
   * @param Request $request
   */
   public function editApi(){

   }

  /**
   * @Route("/delete", name="activityArea_delete", methods={"DELETE"})
   * @param Request $request
   */
   public function deleteApi(){

   }
}
