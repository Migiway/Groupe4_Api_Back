<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 07/01/2019
 * Time: 19:04
 */

namespace App\AdminBundle\Form;

use App\AdminBundle\Entity\Participate;
use App\AdminBundle\Entity\Contact;
use App\AdminBundle\Entity\Operation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ParticipateType extends AbstractType
{
    function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('operation_participate', EntityType::class, array(
                'class' => Operation::class,
                'choice_label' => 'operation_name'
            ))
            ->add('participate_contact', EntityType::class, array(
                'class' => Contact::class,
                'choice_label' => 'contact_nom'
            ));
    }
}
