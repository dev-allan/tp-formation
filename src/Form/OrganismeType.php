<?php

namespace App\Form;

use App\Entity\Organisme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrganismeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'M2i',
                ],
            ])
            ->add('adresse', null, [
                'label' => 'Adresse',
                'attr' => [
                    'placeholder' => "4 Av. de l'Horizon, 59650 Villeneuve-d'Ascq",
                ],
            ])
            ->add('numero_tel', null, [
                "attr" => [
                    "placeholder" => "0320190719"

                ],
            ])
            ->add('email_contact', null, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => "contact@m2i.fr"
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Organisme::class,
        ]);
    }
}
