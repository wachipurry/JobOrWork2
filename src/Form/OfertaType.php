<?php

namespace App\Form;

use App\Entity\Oferta;
use App\Entity\Empresa;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OfertaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $ofertaDetall)
    {
        $builder
            ->add('titol', TextType::class)
            ->add('descripcio', TextareaType::class)
            ->add('dataPub', DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
                'data' => new \DateTime("now")])
                ->add('empresa', EntityType::class, [
                    'class' => Empresa::class,
                    'choice_label' => function ($empresa) {
                        return $empresa->getNom();
                    }
                ]);
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Oferta::class,
        ]);
    }
}
