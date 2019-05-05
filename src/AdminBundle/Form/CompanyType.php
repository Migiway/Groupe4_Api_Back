<?php

namespace App\AdminBundle\Form;

use App\Entity\Post;
use App\AdminBundle\Entity\Contacts;
use App\AdminBundle\Entity\Company;
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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\AdminBundle\Entity\User;
use App\AdminBundle\Entity\StatutJuridique;
use App\AdminBundle\Entity\ParameterCompanyCA;
use App\AdminBundle\Entity\ParameterCompanySecteur;
use App\AdminBundle\Entity\ParameterCompanyStatutJuridique;
use App\AdminBundle\Entity\ParameterCompanyStatut;
use App\AdminBundle\Entity\ParameterCompanyEffectifs;
use App\AdminBundle\Entity\NbSalary;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_id', EntityType::class, [
                'class' => User::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.user_lastName', 'ASC');
                },
                "label" => "Compte suivi par",
                'required' => false
            ])
            ->add('statut_juridique_id', EntityType::class, [
                'class' => ParameterCompanyStatutJuridique::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->orderBy('l.ordre', 'ASC');
                },
                "label" => "Statut juridique",
                'required' => false
            ])
            ->add('secteur_activite_id', EntityType::class, [
                'class' => ParameterCompanySecteur::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.libelle', 'ASC');
                },
                "label" => "Activité (NAF)",
                'required' => false
            ])
            ->add('companyStatus', EntityType::class, [
                'class' => ParameterCompanyStatut::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('n')
                        ->orderBy('n.libelle', 'ASC');
                },
                "label" => "Status",
                'required' => false
            ])            
            ->add('nb_salarie_id', EntityType::class, [
                'class' => ParameterCompanyEffectifs::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('n')
                        ->orderBy('n.ordre', 'ASC');
                },
                "label" => "Effectifs",
                'required' => false
            ])
            ->add('companyCode', TextType::class, array(
                'label' => 'Code entreprise',
                'required' => false
            ))
            ->add('companyEmail', TextType::class, array(
                'label' => 'Email',
                'required' => false
            ))
            ->add('companyCa', EntityType::class, [
                'class' => ParameterCompanyCA::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.ordre', 'ASC');
                },
                "label" => "Chiffre d'affaire",
                'required' => false
            ])
            ->add('companyName', TextType::class, array(
                'label' => 'Nom',
                'required' => false
            ))
            ->add('companyCommentary', TextareaType::class, array(
                'label' => 'Commentaire',
                'required' => false
            ))
            ->add('companyAddress', TextType::class, array(
                'label' => 'Adresse',
                'required' => false
            ))
            ->add('companyCompAddress', TextType::class, array(
                'label' => 'Complémentaire adresse',
                'required' => false
            ))
            ->add('companyPostcode', TextType::class, array(
                'label' => 'Code postal',
                'required' => false
            ))
            ->add('companyCity', TextType::class, array(
                'label' => 'Ville',
                'required' => false
            ))
            ->add('companyPhone', TextType::class, array(
                'label' => 'Téléphone',
                'required' => false
            ))
            ->add('companyFax', TextType::class, array(
                'label' => 'Fax',
                'required' => false
            ))
            ->add('companyWebsite', TextType::class, array(
                'label' => 'Site web',
                'required' => false
            ))
            ->add('companySiret', TextType::class, array(
                'label' => 'N° SIRET',
                'required' => false
            ))
            ->add('companyFile', FileType::class, array(
                'label' => 'Image',
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
            'data_class' => Company::class,
        ]);
    }
}
