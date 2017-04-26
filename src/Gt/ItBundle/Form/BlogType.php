<?php

namespace Gt\ItBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('title')
          ->add('author')->add('vote',new VoteType())
             ->add('content','textarea',array('attr'=>array('class'=>'ckeditor')))
            ->add('image',new ImageType())
        //    ->add('tag')
        ; $builder->add('tag', 'entity', array('class' => 'GtItBundle:Tag',
            'property'=>'name','multiple'=>true,
        ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gt\ItBundle\Entity\Blog'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gt_itbundle_blog';
    }
}
