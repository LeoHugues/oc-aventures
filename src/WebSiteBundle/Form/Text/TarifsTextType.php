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

class TarifsTextType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Input menu
        $builder->add('Titre')
            
            ->add('titre_tarif_accrobrache')
            
            ->add('forfait1')
            ->add('parcours1')
            
            ->add('forfait2')
            ->add('parcours2')
            
            ->add('forfait3')
            ->add('parcours3')
            
            ->add('forfait4')
            ->add('parcours4')
            
            ->add('titre_tarif_laser_game')

            ->add('forfait_laser_1')
            ->add('forfait_laser_2')
            ->add('forfait_laser_desc_1')
            ->add('forfait_laser_desc_2')
            
            ->add('texte_groupe')
            
            ->add('titre_paiement')
            ->add('mode_paiement')
            ->add('pas_cb')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_text_tarifs_translation';
    }
}