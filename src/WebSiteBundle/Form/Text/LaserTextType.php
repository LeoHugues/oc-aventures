<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 31/05/2016
 * Time: 21:41
 */

namespace WebSiteBundle\Form\Text;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LaserTextType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Input menu
        $builder->add('laser_game')
            ->add('titre_intro')
            ->add('titre_laser_game')
            ->add('desc_laser_game', 'textarea')
            ->add('desc_laser_game_2', 'textarea')
            ->add('desc_details_laser_game', 'textarea')
            ->add('message_fin')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_text_laser_translation';
    }
}