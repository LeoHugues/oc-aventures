<?php
/**
 * Created by PhpStorm.
 * User: lehug
 * Date: 07/10/16
 * Time: 17:05
 */

namespace WebSiteBundle\Form\Image;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ParcoursType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imgBlock1', new ImageType())
            ->add('sliders', new GalleryType())
            ->add('enregistrer', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-default col-sm-4 col-sm-offset-4'
                )
            ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_gallery_plan';
    }
}