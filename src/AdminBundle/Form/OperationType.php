<?php
namespace App\AdminBundle\Form;

use App\Entity\Post;
use phpDocumentor\Reflection\Types\Integer;
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
        ->add('operation_prenom', TextType::class, array('label' => 'Prenom :'))
        ->add('operation_object', TextType::class, array('label' => 'Objet du mail :'))
        ->add('operation_relance', IntegerType::class, array('label' => 'Nb relance auto :'))
        ->add('operation_envoi_date', DateType::class, array('label' => 'Date d envoi:'))
        ->add('operation_date_cloture', DateType::class, array('label' => 'Date cloture:'))
//        ->add('operation_author_id', TextType::class, array('label' => 'Auteur:'))
        ->add('operation_note', TextType::class, array('label' => 'Note:'))
        ->add('operation_url', TextType::class, array('label' => 'Url :'))
        ->add('operation_type', TextType::class, array('label' => 'Type :'))
        ->add('operation_img_haut', TextType::class, array('label' => 'Image Haut :'))
        ->add('operation_img_lateral', TextType::class, array('label' => 'Image lateral :'))
        ->add('operation_genre', TextType::class, array('label' => 'Genre :'))
        ->add('operation_metier', TextType::class, array('label' => 'Metier :'))
        ->add('operation_fonction', TextType::class, array('label' => 'Fonction :'))
        ->add('operation_tel', TextType::class, array('label' => 'Tel :'))
        ->add('operation_fixe', TextType::class, array('label' => 'Fixe :'))
        ->add('operation_email', TextType::class, array('label' => 'Email :'))
        ->add('operation_photo', TextType::class, array('label' => 'Photo :'))
        ->add('operation_linkedin', TextType::class, array('label' => 'Linkedin :'))
        ->add('operation_newsletter', TextType::class, array('label' => 'Newsletter :'))
        ->add('operation_offresCommerciales', TextType::class, array('label' => 'Offres Commerciales :'));
        /*->add('save', SubmitType::class, array('label' => 'Ajouter une opération'));*/

    }
}
