<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 31/05/2016
 * Time: 21:10
 */

namespace WebSiteBundle\Form\Text;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class HeaderTextType extends AbstractType
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
            ->add('forfait')
            ->add('plan_parc')
            ->add('contact')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_text_header_translation';
    }
}