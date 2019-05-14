<?php

namespace App\AdminBundle\Form;

use App\Entity\Post;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\AdminBundle\Entity\User;
use App\AdminBundle\Entity\ParameterNoteCategorie;
use App\AdminBundle\Entity\ParameterNotePriorite;
use App\AdminBundle\Entity\ParameterNoteEcheance;
use App\AdminBundle\Entity\Note;


class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder            
            ->add('title', TextType::class, array(
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Nom de la note'],
            ))
            ->add('dateCreation', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de création'
            ])
            ->add('dateEcheance', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date d\'échéance'
            ])
            ->add('rappel_email', CheckboxType::class, [
                'label' => false,
                'label_attr' => array(
                    'class' => 'custom-control-label'
                ),
                'attr' => array(
                    'class' => 'custom-control-input'
                ),
                'required' => false
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.user_lastName', 'ASC');
                },
                "label" => "Affecté à"
            ])
            ->add('categorie_note', EntityType::class, [
                'class' => ParameterNoteCategorie::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.libelle', 'ASC');
                },
                "label" => "Catégorie",
                'required' => false
            ])
            ->add('priorite_note', EntityType::class, [
                'class' => ParameterNotePriorite::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.libelle', 'ASC');
                },
                "label" => "Priorité",
                'required' => false
            ])
            ->add('echeance_note', EntityType::class, [
                'class' => ParameterNoteEcheance::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.libelle', 'ASC');
                },
                "label" => "Echéance",
                'required' => false
            ])
            ->add('description', TextareaType::class, array(
                'label' => false,
                'required' => false
            ))
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary'],
                'label' => 'Enregistrer',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
        ]);
    }
}
