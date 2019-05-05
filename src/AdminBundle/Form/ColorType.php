<?php

namespace App\AdminBundle\Form;

//use App\AdminBundle\Entity\Job;
use App\AdminBundle\Entity\Colors;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ColorType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('colors_code', TextType::class, array('label' => 'Nom du métier : '))
            ->add('submit', SubmitType::class, array('label' => 'Enregistrer'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => colors::class,
        ]);
    }


}
