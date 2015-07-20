<?php

namespace Air\BookishBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BestsellerListType extends AbstractType
{
    public function getName()
    {
        return 'bestseller_type';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('listName', 'text')
            ->add('displayName', 'text')
            ->add('updated', 'text')
            ->add('listImage', 'text')
            ->add('books', 'entity', array(
                'class' => 'Air\BookishBundle\Entity\Book',
                'property' => 'title',
                'multiple' => true,
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Air\BookishBundle\Entity\BestsellerList',
            'allow_extra_fields' => true,
            'by_reference' => false,
            'csrf_protection' => false,
        ));
    }
}