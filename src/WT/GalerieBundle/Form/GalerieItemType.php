<?php

namespace WT\GalerieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Doctrine\Common\Collections\Selectable;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class GalerieItemType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', FileType::class)
            /*
            ->add('name', TextType::class)
            ->add('info', TextareaType::class)
            ->add('alt', TextType::class)*/
            ->add('type', TextType::class)
            /*->add('url', TextType::class)
            ->add('path', TextType::class)
            //->add('creationdate', DateType::class)
            //->add('editiondate', DateType::class)
            ->add('ispublished' ,  CheckboxType::class, array(
                'label'    => 'publié',
                'required' => false,
                'data' => true,
            ))
            ->add('extention', TextType::class)
            
            //->add('galerie')
            */
            ;
    }
        

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WT\GalerieBundle\Entity\GalerieItem'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wt_galeriebundle_galerieitem';
    }


}
