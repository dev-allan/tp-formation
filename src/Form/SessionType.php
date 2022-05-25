<?php

namespace App\Form;

use App\Entity\Session;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_debut', null, [
                'label' => 'Date de début',
                'widget' => 'single_text',
                // 'format' => 'dd/MM/yyyy',
                'attr' => [
                    'class' => 'js-datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd/mm/yyyy',
                    'data-date-language' => 'fr',
                ],
            ])
            ->add('date_fin', null, [
                'label' => 'Date de fin',
                'widget' => 'single_text',
                // 'format' => 'dd/MM/yyyy',
                'attr' => [
                    'class' => 'js-datepicker',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd/mm/yyyy',
                    'data-date-language' => 'fr',
                ],
            ])
            ->add('nom',null, [
                "attr" => [
                    "placeholder" => "Nom de la session"
                ],
            ])
            ->add('accueille')
            ->add('formateur_id')
            ->add('promotion_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
