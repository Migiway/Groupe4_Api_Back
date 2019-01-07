<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 10/12/2018
 * Time: 12:09
 */
namespace App\Form;

use App\Entity\GraphStyle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class GraphStyleType extends AbstractType
{
    function buildForm( FormBuilderInterface $builder, array $options)
    {
        $builder->add('graph_style_libelle', TextType::class, array('label' => 'Libellé : '));
    }
}