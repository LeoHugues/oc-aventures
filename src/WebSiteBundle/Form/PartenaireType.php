<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 09/03/2016
 * Time: 12:14
 */

namespace WebSiteBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

class PartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
                ->add('address','text')
                ->add('img', 'text')
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