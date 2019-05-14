<?php

namespace App\AdminBundle\Form;

use App\AdminBundle\Entity\Post;
use App\AdminBundle\Entity\Operation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\AdminBundle\Entity\User;

class OperationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_id', EntityType::class, [
                'class' => User::class,
                'query_builder' => function (EntityRepository $requete) {
                    return $requete->createQueryBuilder('u')
                        ->orderBy('u.user_lastName', 'ASC');
                },
                "label" => "Auteur"
            ])
            ->add('operation_code', TextType::class, array('label' => 'Code opération :'))
            ->add('operation_name', TextType::class, array('label' => 'Nom :'))
            ->add('operation_object', TextType::class, array('label' => 'Objet du mail :'))
            ->add('operation_relance', IntegerType::class, array('label' => 'Nb relance auto :'))
            ->add('operation_envoi_date', DateType::class, ['widget' => 'single_text','label' => 'Date d\'envoi'])
            ->add('operation_date_cloture', DateType::class, ['widget' => 'single_text','label' => 'Date de cloture'])
            ->add('operation_note', TextareaType::class, array('label' => 'Note:'))
            ->add('save', SubmitType::class, array(
                'attr' => ['class' => 'btn btn-primary'],
                'label' => 'Enregistrer'));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Operation::class,
        ]);
    }
}
