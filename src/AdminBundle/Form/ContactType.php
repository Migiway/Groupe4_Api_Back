<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 10/12/2018
 * Time: 12:09
 */
namespace App\AdminBundle\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ContactType extends AbstractType
{
    function buildForm( FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contact_codeClient', TextType::class, array('label' => 'Code Client : '))
            ->add('contact_genre', CheckboxType::class, array('label' => 'Genre : '))
            ->add('contact_prenom', TextType::class, array('label' => 'Prénom : '))
            ->add('contact_nom', TextType::class, array('label' => 'Nom : '))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}