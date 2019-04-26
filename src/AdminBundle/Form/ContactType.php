<?php
/**
 * Created by PhpStorm.
 * User: migiw
 * Date: 10/12/2018
 * Time: 12:09
 */
namespace App\AdminBundle\Form;


use App\AdminBundle\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Proxies\__CG__\App\AdminBundle\Entity\Job;
use Proxies\__CG__\App\AdminBundle\Entity\Company;
use Proxies\__CG__\App\AdminBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ContactType extends AbstractType
{
    function buildForm( FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contact_codeClient', TextType::class )
            ->add('contact_genre', ChoiceType::class, [
                'choices'  => [
                    'Homme' => '1',
                    'Femme' => '2',
                ], 'label' => false
            ])
            ->add('contact_prenom', TextType::class, array('label' => 'Prénom '))
            ->add('contact_nom', TextType::class, array('label' => 'Nom '))
            ->add('contact_date_naissance', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de naissance',
            ])
            ->add('job_id', EntityType::class, [
                'class' => Job::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.job_libelle', 'ASC');
                },
                "label" => "Métier"
            ])
            ->add('contact_tel_mobile', TextType::class, array('label' => 'Tel. Mobile'))
            ->add('contact_adresse_linkedin', TextType::class, array('label' => 'Profil Linkedin'))
            ->add('contact_adresse_facebook', TextType::class, array('label' => 'Profil Facebook'))
            ->add('contact_adresse_twitter', TextType::class, array('label' => 'Profil Twitter'))
            ->add('contact_email', TextType::class, array('label' => 'Email'))
            ->add('company_id', EntityType::class, [
                'class' => Company::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.companyName', 'ASC');
                },
                "label" => "Entreprise"
            ])
            ->add('contact_metier', TextType::class, array('label' => 'Nom du poste'))
            ->add('contact_niv_decision', ChoiceType::class, [
                'choices'  => [
                    'one' => 0,
                    'Two' => 1,
                ], 'label' => 'Pouvoir décisionnel'
            ])
            ->add('user_id', EntityType::class, [
                'class' => User::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.user_lastName', 'ASC');
                },
                "label" => "Pouvoir décisionnel"
            ])
            ->add('contact_tel_fixe', TextType::class, array('label' => 'Tel. Fixe direct'))
            ->add('contact_tel_standard', TextType::class, array('label' => 'Tel. du standard'))
            ->add('contact_commentaire', TextareaType::class, array('label' => 'Remarques'))
            ->add('contact_photo', FileType::class)
            ->add('save', SubmitType::class, [
            'attr' => ['class' => 'btn btn-primary'],
                'label' => 'Enregistrer',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
