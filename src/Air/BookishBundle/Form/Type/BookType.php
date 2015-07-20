<?php

namespace Air\BookishBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function getName()
    {
        return 'book_type';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ageGroup', 'text')
            ->add('author', 'text')
            ->add('contributor', 'text')
            ->add('contributorNote', 'text')
            ->add('createdDate', 'datetime')
            ->add('description', 'textarea')
            ->add('price', 'number')
            ->add('primaryIsbn13', 'text')
            ->add('primaryIsbn10', 'text')
            ->add('publisher', 'text')
            ->add('rank', 'number')
            ->add('title', 'text')
            ->add('updatedDate', 'datetime');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Air\BookishBundle\Entity\Book',
            'allow_extra_fields' => true,
            'csrf_protection' => false,
        ));
    }
}