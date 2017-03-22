<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 08/03/2016
 * Time: 16:44
 */

namespace WebSiteBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PartenairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('partenaires', 'collection', array(
            'type' => new PartenaireType(),
            'allow_add' => true,
            'allow_delete' => true,
        ));
        $builder->add('valider', 'submit');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_partenaires';
    }
}