<?php
/**
 * Created by PhpStorm.
 * User: lehug
 * Date: 06/10/16
 * Time: 15:17
 */

namespace WebSiteBundle\Form\Image;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class GalleryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', 'comur_gallery', array(
                'uploadConfig'          => array(
                    'uploadRoute'       => 'comur_api_upload',        //optional
                    'uploadUrl'         => __DIR__.'/../../../../web/front/images/',       // required - see explanation below (you can also put just a dir path)
                    'webDir'            => 'front/images/',              // required - see explanation below (you can also put just a dir path)
                    'fileExt'           => '*.jpg;*.gif;*.png;*.jpeg',    //optional
                    'libraryRoute'      => 'comur_api_image_library', //optional
                    'showLibrary'       => true,                      //optional
                    'generateFilename'  => true          //optional
                ),
                'cropConfig' => array(
                    'minWidth'      => 840,
                    'minHeight'     => 400,
                    'aspectRatio'   => true,              //optional
                    'cropRoute'     => 'comur_api_crop',    //optional
                    'forceResize'   => false,             //optional
                    'thumbs'        => array(                  //optional
                        array(
                            'maxWidth'          => 420,
                            'maxHeight'         => 200,
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
        return 'website_gallery';
    }
}