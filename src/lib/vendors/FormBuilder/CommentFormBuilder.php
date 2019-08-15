<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\TextField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;

class CommentFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Auteur',
        'name' => 'author',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('L\'author spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier l\'author du commentaire'),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Contenu',
        'name' => 'content',
        'rows' => 7,
        'cols' => 50,
        'validators' => [
          new NotNullValidator('Merci de spécifier votre commentaire'),
        ],
       ]));
  }
}