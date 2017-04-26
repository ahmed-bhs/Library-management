<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Utilisateurs\UtilisateursBundle\Form;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;



class ProfileType extends AbstractType
{
    
     public function buildForm(FormBuilderInterface $builder, array $options)
    {
$builder               ->add('cin', null, array('required' => false ))


                            ->add('imageFile', 'vich_image', array('required' => false ,'label' =>''))->add('username')
                ->add('surname', null, array(
    'required' => false))
                ->add('forename', null,array('required' => false))  
                ->add('nickname',null,array('required' => false))  
                ->add('email', null, array('required' => false )) 

   


->add('agence', ChoiceType::class, array(
    'choices' => array('Agence Tunis' =>'Agence Tunis' ,'Agence Nabeul' =>'Agance Nabeul','Agence Sfax' =>'Agence Sfax','Agence Bardo' =>'Agence Bardo','Agence Lac' =>'Agence Lac','Agence Ariana' =>'Agance Ariana ','Agence Korba' =>'Agance korba'),
));
    }

   



      public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';}
    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }

}
