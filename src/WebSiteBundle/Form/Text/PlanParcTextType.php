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

class PlanParcTextType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Input menu
        $builder->add('titre_section_plan_parc')
            ->add('information_complementaire_parc', 'textarea')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_text_plan_parc_translation';
    }
}