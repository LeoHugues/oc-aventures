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