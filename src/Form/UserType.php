<?php


namespace App\Form;


use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;

class UserType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('Username', TextType::class)
            ->add('email', TextType::class)
            ->add('vorname', TextType::class)
            ->add('nachname', TextType::class)
            ->add('nachname', TextType::class)
            ->add('password', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task']);
    }
}