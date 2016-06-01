<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 31/05/2016
 * Time: 21:20
 */

namespace WebSiteBundle\Form\Text;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class IndexTextType extends  AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // input accueil (index)
        $builder->add('oc_bienvenue')
            ->add('oc_hauteur')

            ->add('nos_parcours_accrobranche')
            ->add('ouverture_fermeture')
            ->add('accroche_nos_parcours', 'textarea')
            ->add('parcours_adulte')
            ->add('parcours_adulte_desc')
            ->add('parcours_enfant')
            ->add('parcours_enfant_desc')

            ->add('le_laser_game')
            ->add('intro_texte_laser')
            ->add('accroche_laser', 'textarea')
            ->add('lien_laser_1')
            ->add('accroche_laser_2')
            ->add('lien_laser_2')
            ->add('chute_laser')

            ->add('confort_title')
            ->add('confort_terrasse')
            ->add('confort_pique_nique')
        ;
    }

    /**
     * @return string
     */
    public function getName()
{
    return 'website_text_index_translation';
}
}