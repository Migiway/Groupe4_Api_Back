<?php

namespace App\AdminBundle\Form;

use App\Entity\Post;
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
            ->add('colors_code', TextType::class, array('label' => 'Couleur primaire : ','required' => false))
            ->add('colors_survol', TextType::class, array('label' => 'Couleur de survol : ','required' => false))
            ->add('colors_champ_obligatoire', TextType::class, array('label' => 'Champs ogligatoires : ','required' => false))
            ->add('colors_tag_entreprise', TextType::class, array('label' => 'Couleur Tags entreprises : ','required' => false))
            ->add('colors_tag_contact', TextType::class, array('label' => 'Couleur Tags contacts : ','required' => false))
            ->add('colors_tag_score', TextType::class, array('label' => 'Couleur Tags scores : ','required' => false))
            ->add('submit', SubmitType::class, array('label' => 'Enregistrer'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => colors::class,
        ]);
    }


}
