<?php

namespace BackBundle\Form;

use BackBundle\Entity\Ecran;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Comur\ImageBundle\Form\Type\CroppableImageType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EcranType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $image = new Ecran();
        $builder
            ->add('titre',TextType::class,array('label' => 'Titre *','required' => false))
            ->add('contenu', TextareaType::class, array('label' => 'Contenu de l\'écran *', 'required' => false, 'attr' => array('class' => 'ckeditor')))
//            ->add('contenu',TextType::class,array('label' => 'Contenu','required' => false))

            ->add('image', CroppableImageType::class, array('label' => 'Image', 'required' => false,
                'uploadConfig' => array(
                    'uploadUrl' => $image->getUploadDir(),
                    'webDir' => $image->getUploadRootDir(),
                    'fileExt' => '*.jpg;*.bmp;*.png;*.jpeg',
                ),
                'cropConfig' => array(
                    'minWidth' => 180,
                    'minHeight' => 100,
                )
            ))

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Ecran',
            'attr' => ['id' => 'form']
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backbundle_ecran';
    }


}
