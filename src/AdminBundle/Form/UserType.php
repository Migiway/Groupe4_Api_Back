<?php

namespace App\AdminBundle\Form;

use App\AdminBundle\Entity\ActivityArea;
use App\AdminBundle\Entity\Role;
use App\AdminBundle\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            ->add('user_code', NumberType::class, array('label' => 'Code collaborateur: '))
            ->add('user_gender', ChoiceType::class, array(
                'choices' => [
                    'Homme' => true,
                    'Femme' => false,
                ],
                'label' => 'Gender : '
            ))
            ->add('user_firstName', TextType::class, array('label' => 'Prénom : '))
            ->add('user_lastName', TextType::class, array('label' => 'Nom : '))
            ->add('user_dob', DateType::class, array(
                'label' => 'Date de naissance : ',
                'widget' => 'single_text',
            ))
            ->add('user_arrival_date', DateType::class, array(
                'label' => 'Date d\'arrivé/départ : ',
                'widget' => 'single_text',
            ))
            ->add('user_quit_date', DateType::class, array(
                'widget' => 'single_text',
            ))
            ->add('user_phone', TextType::class, array('label' => 'Tél. mobile : '))
            ->add('user_lkd', TextType::class, array('label' => 'Profile Linkedin : '))
            ->add('user_facebook', TextType::class, array('label' => 'Profile Facebook : '))
            ->add('user_twitter', TextType::class, array('label' => 'Profile Twitter : '))
            ->add('user_email', TextType::class, array('label' => 'Email : '))
            ->add('user_password', TextType::class, array('label' => 'Mot de passe : '))
            ->add('area', EntityType::class, [
                'class' => ActivityArea::class,
                'choice_label' => 'activity_area',
                "label" => "Zone affectée : "
            ])
            ->add('user_function', TextType::class, array('label' => 'Fonction : '))
            ->add('role', EntityType::class, [
                'class' => Role::class,
                'choice_label' => 'libelle',
                "label" => "Profil/droits : "
            ])
            ->add('user_fixe', TextType::class, array('label' => 'Tel fixe : '))
            ->add('user_annotation', TextareaType::class, array('label' => 'Remarques : '))
            //->add('imgUrl', TextType::class, array('label' => 'Image : '))
            ->add('submit', SubmitType::class, array('label' => 'Enregistrer'));
    }


}
