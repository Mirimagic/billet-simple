<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\TextField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;

class ChaptersFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Auteur',
        'name' => 'author',
        'maxLength' => 20,
        'validators' => [
          new MaxLengthValidator('L\'author spécifié est trop long (20 caractères maximum)', 20),
          new NotNullValidator('Merci de spécifier l\'author de la chapters'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Titre',
        'name' => 'title',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('Le title spécifié est trop long (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier le title de la chapters'),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Contenu',
        'name' => 'content',
        'rows' => 8,
        'cols' => 60,
        'validators' => [
          new NotNullValidator('Merci de spécifier le content de la chapters'),
        ],
       ]));
  }
}