<?php

namespace App\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type as FT;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProfileChangePasswordType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $data = $options['data'];

        $builder
            ->add('plainPassword', FT\RepeatedType::class, array(
                'label' => 'Mot de passe : ',
                'type' => FT\PasswordType::class,
                'invalid_message' => 'Les mots de passe sont différent.',
                'first_options' => array('label' => 'Nouveau Mot de passe'),
                'second_options' => array('label' => 'Confirmez le Nouveau Mot de passe'),
            ))
            ->add('submit', SubmitType::class, array('label' => 'Save'));
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
        return 'userchangepassword';
    }
}
