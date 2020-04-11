<?php

namespace App\Form;

use App\Entity\Oferta;
use App\Entity\Empresa;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EmpresaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $empresaDetall)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('correu', EmailType::class)
            ->add('tipus',TextType::class)
            ->add('logo', TextType::class, [
                'data' => "logo0.png"
            ]);
                ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Empresa::class,
        ]);
    }
}
