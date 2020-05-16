<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    
    public const HONEYPOT_FIELD_NAME = 'phone';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::class, [
                'label' => "Prénom",
                'attr' => [
                    'class' => "uk-input",
                    'placeholder' => "Prénom"
                ]
            ])
            ->add('nom', TextType::class, [
                'label' => "Nom",
                'attr' => [
                    'class' => "uk-input",
                    'placeholder' => "Nom"
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => "Email",
                'attr' => [
                    'class' => "uk-input",
                    'placeholder' => "Email"
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => "Message",
                'attr' => [
                    'class' => "uk-textarea",
                    'placeholder' => "Votre message",
                    'rows' => '5'
                ]
            ])
            ->add(self::HONEYPOT_FIELD_NAME, TextType::class, ['required' => false])
            ->add('envoyer', SubmitType::class, [
                'attr' => [
                    'class' => "uk-button uk-button-secondary uk-width-1-1",
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
