<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 09/03/2016
 * Time: 12:14
 */

namespace WebSiteBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
                ->add('address','text')
                ->add('desc','textarea')
            ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_partenaire';
    }
}