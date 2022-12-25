<?php

namespace App\FormType;

use App\Constant\UserConstants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $options['data'];

        $builder
            ->add('username', TextType::class, [
                'label' => 'Nome',
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('email', TextType::class, [
                'label' => 'Email',
                'data' => $user->getEmail(),
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('role', ChoiceType::class, [
                'label' => 'Permissão',
                'choices' => UserConstants::ROLES,
                'data' => $user->getRoles()[0],
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control'],
                'mapped' => false,
            ]);
    }   

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['user']);
    }
}
