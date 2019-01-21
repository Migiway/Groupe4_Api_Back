<?php
namespace App\AdminBundle\Form;

use App\Entity\Parameter;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;



class ParameterType extends AbstractType
{

	 public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
            ->add('param_nomAppli', TextType::class, array('label' => 'Nom de l\'application : '))
            ->add('param_logo', TextType::class, array('label' => 'Logo : '))
            ->add('param_adr', TextType::class, array('label' => 'Adresse : '))
            ->add('param_compl', TextType::class, array('label' => 'Compl : '))
            ->add('param_tel', TextType::class, array('label' => 'Telephone : '))
            ->add('param_fax', TextType::class, array('label' => 'Fax : '))
            ->add('param_email', TextType::class, array('label' => 'Email : '))
            ->add('param_emailAlert', TextType::class, array('label' => 'Email Alert : '))
            ->add('param_emailContact', TextType::class, array('label' => 'Email Contact : '))
            ->add('submit', SubmitType::class, array('label' => 'Enregistrer'));
    }



}