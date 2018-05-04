<?php

namespace WT\GalerieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use CoreBundle\Entity\Activities;
use WT\GalerieBundle\Entity\Galerie;
use WT\GalerieBundle\Entity\GalerieItem;
use WT\GalerieBundle\Form\GalerieItemType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use WT\GalerieBundle\Repository\GalerieItemRepository;

class GalerieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        // Arbitrairement, on récupère toutes les catégories qui commencent par "D"
        //$pattern = 'D%';
        $pattern =true;

        $builder
            ->add('name', TextType::class)
            //->add('slug', )
            //->add('creationdate', DateType::class)
            //->add('editiondate', DateType::class)
            ->add('descr', TextareaType::class)
            ->add('owner')
            ->add('galerieitems', CollectionType::class, array(
                'entry_type'   => GalerieItemType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
            )) //Collection type permet de faire des add delete a la volée
            /*->add('galerieitems', EntityType::class, array(
                'class'        => 'WTGalerieBundle:GalerieItem',
                'choice_label' => 'name',
                'multiple'     => true,
                'query_builder'=> function(GalerieItemRepository $repository) use($pattern) {
                    return $repository->getLikeQueryBuilder($pattern);
                }
            )) //entitytype permet d avoire des liste checkbox radio et autre*/
            ->add('save',       SubmitType::class, array('label' => 'send'));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WT\GalerieBundle\Entity\Galerie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wt_galeriebundle_galerie';
    }


}
