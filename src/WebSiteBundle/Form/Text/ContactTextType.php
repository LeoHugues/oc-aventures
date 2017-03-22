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

class ContactTextType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Input menu
        $builder->add('titre_section_contact')
            ->add('adresse')
            ->add('num_tel')
            ->add('mail')
            ->add('titre_horaire')
            ->add('juillet_aout')
            ->add('horaire_juillet_aout', 'textarea')
            ->add('reste_annee')
            ->add('horaire_reste_annee', 'textarea')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_text_contact_translation';
    }
}