<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 03/03/2016
 * Time: 11:15
 */

namespace WebSiteBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use WebSiteBundle\Form\Text\ContactTextType;
use WebSiteBundle\Form\Text\GalerieTextType;
use WebSiteBundle\Form\Text\HeaderTextType;
use WebSiteBundle\Form\Text\IndexTextType;
use WebSiteBundle\Form\Text\LaserTextType;
use WebSiteBundle\Form\Text\OuverturesTextType;
use WebSiteBundle\Form\Text\ParcoursTextType;
use WebSiteBundle\Form\Text\PlanParcTextType;
use WebSiteBundle\Form\Text\TarifsTextType;

class TextFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Input menu
        $builder->add('header', new HeaderTextType($options['header']))
            ->add('index',      new IndexTextType($options['index']))
            ->add('parcours',   new ParcoursTextType($options['parcours']))
            ->add('tarifs',     new TarifsTextType($options['tarifs']))
            ->add('plan_parc',  new PlanParcTextType($options['plan_parc']))
            ->add('contact',    new ContactTextType($options['contact']))
            ->add('galerie',    new GalerieTextType($options['galerie']))
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