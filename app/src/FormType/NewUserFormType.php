<?php

namespace App\FormType;

use App\Constant\UserConstants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class NewUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Nome',
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('email', TextType::class, [
                'label' => 'Email',
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('role', ChoiceType::class, [
                'label' => 'Permissão',
                'choices' => UserConstants::ROLES,
                'row_attr' => ['class' => 'form-group'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Os campos de senha devem ser iguais.',
                'options' => ['attr' => ['class' => 'form-control password-field']],
                'required' => true,
                'first_options' => ['label' => 'Senha'],
                'second_options' => ['label' => 'Repetir senha'],
            ]);
    }
}
