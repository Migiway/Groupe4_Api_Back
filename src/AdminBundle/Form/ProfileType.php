<?php

namespace App\AdminBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolver;
use App\AdminBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;


class ProfileType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_firstName', null, array('label' => 'First Name'))
            ->add('user_lastName', null, array('label' => 'Last Name'))
            ->add('user_code', NumberType::class, array('label' => 'Code'))
            ->add(
                'user_gender',
                ChoiceType::class,
                array(
                    'label' => 'Gender',
                    'choices' => array(
                        'Male' => 1,
                        'Female' => 0
                    ),
                    'expanded' => true,
                    'multiple' => false
                )
            )
            ->add('user_status', null, array('label' => 'Status'))
            ->add('user_dob', null, array('label' => 'Date of Birth'))
            ->add('user_function', null, array('label' => 'Function'))
            ->add('user_phone', null, array('label' => 'Phone'))
            ->add('user_fixe', null, array('label' => 'Fax'))
            ->add('userFile', FileType::class, array('label' => 'Image', 'required' => false,'attr' => ['class' => 'uploadFile custom-file-input inputfile'],))
            ->add('submit', SubmitType::class, array('label' => 'Enregistrer'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\AdminBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'profile';
    }


}
