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

class OuverturesTextType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Input menu
        $builder->add('titre_ouvertures')
            ->add('texte_ouvertures')
            ->add('titre_hors_saison')
            ->add('texte_hors_saison')
            ->add('titre_saison')
            ->add('texte_saison')
            ->add('texte_supp')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_text_ouvertures_translation';
    }
}