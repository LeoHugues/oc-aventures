<?php
/**
 * Created by PhpStorm.
 * User: lehug
 * Date: 05/10/16
 * Time: 16:04
 */

namespace WebSiteBundle\Form\Image;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ImageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', 'comur_image', array(
                'uploadConfig'          => array(
                    'uploadUrl'         => __DIR__.'/../../../../web/front/images/gallery',       // required - see explanation below (you can also put just a dir path)
                    'webDir'            => 'front/images/gallery',              // required - see explanation below (you can also put just a dir path)
                    'fileExt'           => '*.jpg;*.gif;*.png;*.jpeg',    //optional
                    'showLibrary'       => true,                      //optional
                    'generateFilename'  => true          //optional
                ),
                'cropConfig' => array(
                    'minWidth'      => 200,
                    'minHeight'     => 200,
                    'aspectRatio'   => false,              //optional
                    'cropRoute'     => 'comur_api_crop',    //optional
                    'jpegQuality'   => 70,
                    'thumbs'        => array(                  //optional
                        array(
                            'maxWidth'          => 250,
                            'maxHeight'         => 250,
                            'useAsFieldImage'   => true  //optional
                        )
                    )
                ),
                'label' => false
            ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_image';
    }
}