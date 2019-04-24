<?php
namespace App\AdminBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_username', EmailType::class, [
                'attr' => [
                    'placeholder' => 'E-mail',
                    'icon' => 'user',
                    'class' => 'input-field login_input_field'
                ],
                'required' => true
            ])
            ->add('_password', PasswordType::class, [
                'attr' => [
                    'placeholder' => 'Mot de passe',
                    'icon' => 'lock',
                    'class' => 'input-field login_input_field'
                ],
                'required' => true
            ])
            ->add('save', SubmitType::class, [
                'label' => 'CONNEXION',
                'attr' => [
                    'class' => 'submitBtn btn login_button'
                ]
            ]);
    }
}
