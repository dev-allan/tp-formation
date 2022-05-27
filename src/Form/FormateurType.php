<?php

namespace App\Form;

use App\Entity\Formateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Dupont',
                ],
            ])
            ->add('prenom', null, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Jean',
                ],
            ])
            ->add('numero', null, [
                "attr" => [
                    "placeholder" => "Numéro de téléphone"

                ],
            ])
            ->add('email', null, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'exemple@mail.com'
                ],
            ])
            ->add('enseigne')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formateur::class,
        ]);
    }
}
