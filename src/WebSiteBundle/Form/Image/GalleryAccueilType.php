<?php
/**
 * Created by PhpStorm.
 * User: lehug
 * Date: 06/10/16
 * Time: 15:36
 */

namespace WebSiteBundle\Form\Image;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use WebSiteBundle\Form\Image\GalleryType;

class GalleryAccueilType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imgBlock2', new ImageType())
            ->add('imgBlock3', new ImageType())
            ->add('imgBlock4', new ImageType())
            ->add('enregistrer', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-default col-sm-4 col-sm-offset-4',
                    'style' => 'margin-top: 20px;',
                )
            ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_gallery_accueil';
    }
}