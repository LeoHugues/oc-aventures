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
        $builder->add('texte_ouvertures')
            ->add('accroche_accueil', 'textarea')
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