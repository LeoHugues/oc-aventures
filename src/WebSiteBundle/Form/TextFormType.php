<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 03/03/2016
 * Time: 11:15
 */

namespace WebSiteBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class TextFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Input menu
        $builder->add('accueil')
            ->add('parcours')
            ->add('horaires_dates')
            ->add('tarifs')
            ->add('contact')
            ->add('liens')

            // input accueil (index)
            ->add('oc_bienvenue')
            ->add('oc_hauteur')
            ->add('nos_parcours_accrobranche')
            ->add('ouverture_fermeture')
            ->add('accroche_nos_parcours', 'textarea')
            ->add('parcours_adulte')
            ->add('parcours_adulte_desc')
            ->add('parcours_enfant')
            ->add('parcours_enfant_desc')
            ->add('confort_title')
            ->add('confort_terrasse')
            ->add('confort_pique_nique')

            //input nos parcours
            ->add('nos_parcours')
            ->add('parcours_grand_bouton')
            ->add('parcours_enfant_button')
            ->add('plan_bouton')
            ->add('nos_parcours_grands')
            ->add('parcours_pour_grands')
            ->add('desc_grands_parcours')
            ->add('desc_tyro', 'textarea')
            ->add('desc_details_parcours', 'textarea')
            ->add('fin_grands_parcours')
            ->add('nos_parcours_enfant')
            ->add('parcours_pour_enfant')
            ->add('desc_parcours_enfant', 'textarea')
            ->add('les_parcours')
            ->add('desc_details_enfant', 'textarea')
            ->add('desc_accroche_enfant', 'textarea')
            ->add('fin_parcours_enfant')
            ->add('plan_du_parc')

            ->add('valider', 'submit')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_text_translation';
    }
}