<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 31/05/2016
 * Time: 21:22
 */

namespace WebSiteBundle\Form\Text;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ParcoursTextType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //input nos parcours
        $builder->add('nos_parcours')
            ->add('titre_parcours_enfant')
            ->add('description_parcours_enfant', 'textarea')
            ->add('titre_parcours_adulte')
            ->add('description_parcours_adulte', 'textarea')
            ->add('titre_laser_game')
            ->add('description_laser_game', 'textarea')
            ->add('intitule_bouton_galerie')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_text_parcours_translation';
    }
}