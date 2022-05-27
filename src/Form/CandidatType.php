<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatType extends AbstractType
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
            ->add('email_contact', null, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'exemple@mail.com',
                ],
            ])
            ->add('numero_tel', null, [
                "attr" => [
                    "placeholder" => "Numéro de téléphone"

                ],
            ])
            ->add('promotion_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
