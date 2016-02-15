<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 12/02/2016
 * Time: 18:30
 */

namespace WebSiteBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class DateOuvertureType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ouverture', 'date', array(
                'constraints' => array(
                    new NotBlank()
                ),
                'attr' => array(
                    'label' => "Date d'ouverture"
                ),
            ))
            ->add('fermeture', 'date', array(
                'constraints' => array(
                    new NotBlank()
                ),
                'attr' => array(
                    'label' => "Date de fermeture"
                )
            ))
            ->add('Validez', 'submit')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_date_ouverture';
    }
}