<?php
namespace App\AdminBundle\Form;

use App\Entity\Job;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;



class JobType extends AbstractType
{

	 public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
            ->add('job_libelle', TextType::class, array('label' => 'Nom du métier : '))
            ->add('submit', SubmitType::class, array('label' => 'Enregistrer'));
    }



}