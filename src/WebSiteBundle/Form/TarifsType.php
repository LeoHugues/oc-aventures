<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 10/03/2016
 * Time: 12:21
 */

namespace WebSiteBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TarifsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('F1Prix','text', array(
                'label' => 'Prix'
            ))
            ->add('F1Age','text', array(
                'label' => 'Age'
            ))
            ->add('F2Prix','text', array(
                'label' => 'Prix'
            ))
            ->add('F2Age','text', array(
                'label' => 'Age'
            ))
            ->add('F3Prix','text', array(
                'label' => 'Prix'
            ))
            ->add('F3Age','text', array(
                'label' => 'Age'
            ))
            ->add('F4Prix','text', array(
                'label' => 'Prix'
            ))
            ->add('F4Poids','text', array(
                'label' => 'Poids'
            ))
            ->add('FLaserAge','text', array(
                'label' => 'Age'
            ))
            ->add('FLaser1','text', array(
                'label' => 'Prix 1 parties'
            ))
            ->add('FLaser2','text', array(
                'label' => 'Prix 2 parties'
            ))
            ->add('Valider', 'submit')
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