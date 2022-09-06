<?php
namespace App\Form\Type;

use App\Entity\Uzi;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class UziType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
			->add('neved', TextType::class)
			->add('emailcimed', TextType::class)
			->add('uzeneted', TextareaType::class)
			->add('submit', SubmitType::class, ['label' => 'Klikk a küldéshez.']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    // it's generally a good idea to explicitly specify the data_class
    {
        $resolver->setDefaults([
            'data_class' => Uzi::class
        ]);
    }
}

?>
