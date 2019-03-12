<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 07/01/2019
 * Time: 10:08
 */

namespace App\AdminBundle\Form;

use App\AdminBundle\Entity\Country;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CountryType extends AbstractType
{
    function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pays_nom', TextType::class, array('label' => 'Pays : '));
    }
}
