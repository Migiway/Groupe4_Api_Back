<?php

namespace App\AdminBundle\Form;

use App\AdminBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;


class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_lastName', TextType::class, array('label' => 'Nom : '))
            ->add('user_firstName', TextType::class, array('label' => 'Prénom : '))
            ->add('user_password', TextType::class, array('label' => 'Mot de passe : '))
            ->add('user_email', TextType::class, array('label' => 'Email : '))
            ->add('user_code', NumberType::class, array('label' => 'Code : '))
            ->add('user_gender', CheckboxType::class, array('label' => 'Gender : '))
            ->add('user_status', CheckboxType::class, array('label' => 'Status : '))
            ->add('user_dob', DateType::class, array('label' => 'Date de naissance : '))
            ->add('user_function', TextType::class, array('label' => 'Fonction : '))
            ->add('user_phone', TextType::class, array('label' => 'Tel portable : '))
            ->add('user_fixe', TextType::class, array('label' => 'Tel fixe : '))
            ->add('user_imgUrl', TextType::class, array('label' => 'Image : '))
            ->add('submit', SubmitType::class, array('label' => 'Enregistrer'));
    }


}
