<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 26/05/15
 * Time: 16:38
 */

namespace WebSiteBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class ContactType
 * @package WebSiteBundle\Form
 */
class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
                'constraints' => array(
                    new NotBlank()
                )
            ))
            ->add('mail', 'email', array(
                'constraints' => array(
                    new NotBlank(),
                    new Email()
                )
            ))
            ->add('numTel', 'number', array(
                'constraints' => array(
                    new Length(array(
                        'min' => 9,
                        'max' => 9
                    ))
                )
            ))
            ->add('message', 'textarea', array(
                'constraints' => array(
                    new NotBlank()
                )
            ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'website_contact';
    }
}