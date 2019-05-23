<?php

namespace App\AdminBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class EmailTemplateType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emailSubject', TextType::class, array('label' => 'Email Subject : ', 'required' => true))
            ->add('emailImage', FileType::class, array('label' => 'Image : ', 'required' => false))
            ->add('emailBody', TextareaType::class, array('label' => 'Email Body : ', 'required' => true))
            ->add('emailBtnText', TextType::class, array('label' => 'Button Text : ', 'required' => false))
            ->add('pageTitle', TextType::class, array('label' => 'Page Title : ', 'required' => true))
            ->add('pageImage', FileType::class, array('label' => 'Image : ', 'required' => false))
            ->add('pageIntroTitle', TextType::class, array('label' => 'Intro Title : ', 'required' => true))
            ->add('pageIntroText', TextareaType::class, array('label' => 'Intro Text : ', 'required' => true))
            ->add('pageBtnTxt', TextType::class, array('label' => 'Button Text : ', 'required' => false))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer'));
    }

}
