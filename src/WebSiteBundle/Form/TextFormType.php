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
use WebSiteBundle\Form\Text\HeaderTextType;
use WebSiteBundle\Form\Text\IndexTextType;
use WebSiteBundle\Form\Text\LaserTextType;
use WebSiteBundle\Form\Text\OuverturesTextType;
use WebSiteBundle\Form\Text\ParcoursTextType;
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
            ->add('index', new IndexTextType($options['index']))
            ->add('parcours', new ParcoursTextType($options['parcours']))
            ->add('laser', new LaserTextType($options['laser']))
            ->add('ouvertures', new OuverturesTextType($options['ouvertures']))
            ->add('tarifs', new TarifsTextType($options['tarifs']))
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