<?php
namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('company_name', TextType::class, array('label' => 'Nom : '))
        ->add('company_status', TextType::class, array('label' => 'Status : '))
        ->add('company_logo', TextType::class, array('label' => 'Logo : '))
        ->add('company_commentary', TextType::class, array('label' => 'Commentaire : '))
        ->add('company_category', TextType::class, array('label' => 'Catégories : '))
        ->add('company_address', TextType::class, array('label' => 'Adresse : '))
        ->add('company_comp_address', TextType::class, array('label' => 'Complémentaire adresse : '))
        ->add('company_postcode', TextType::class, array('label' => 'Code postal : '))
        ->add('company_city', TextType::class, array('label' => 'Ville : '))
        ->add('company_phone', TextType::class, array('label' => 'Téléphone : '))
        ->add('company_fax', TextType::class, array('label' => 'Fax : '))
        ->add('company_website', TextType::class, array('label' => 'Site web : '))
        ->add('company_siret', TextType::class, array('label' => 'SIRET : '))
        ->add('company_codeNaf', TextType::class, array('label' => 'Code NAF : '))
        ->add('company_source', TextType::class, array('label' => 'Source : '))
        ->add('save', SubmitType::class, array('label' => 'Ajouter une entreprise'));

    }

    // public function configureOptions(OptionsResolver $resolver)
    // {
    //     $resolver->setDefaults([
    //         'data_class' => Post::class,
    //     ]);
    // }
}
