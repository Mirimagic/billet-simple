<?php
namespace App\Frontend\Modules\Home;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \OCFram\FormHandler;

class HomeController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $numberChapters = $this->app->config()->get('number_chapters');
    $numberCaracters = $this->app->config()->get('number_caracters');
    
    // On ajoute une définition pour le title.
    $this->page->addVar('title', 'Liste des '.$numberChapters.' dernières chapters');
    
    // On récupère le manager des chapters.
    $manager = $this->managers->getManagerOf('Chapters');
    
    $listeChapters = $manager->getList(0, $numberChapters);
    
    foreach ($listeChapters as $chapters)
    {
      if (strlen($chapters->content()) > $numberCaracters)
      {
        $debut = substr($chapters->content(), 0, $numberCaracters);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
        
        $chapters->setContenu($debut);
      }
    }
    
    // On ajoute la variable $listeChapters à la vue.
    $this->page->addVar('listeChapters', $listeChapters);
  }
  
  public function executeShow(HTTPRequest $request)
  {
    $chapters = $this->managers->getManagerOf('Chapters')->getUnique($request->getData('id'));
    
    if (empty($chapters))
    {
      $this->app->httpResponse()->redirect404();
    }
    
    $this->page->addVar('title', $chapters->title());
    $this->page->addVar('chapters', $chapters);
    $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($chapters->id()));
  }

  public function executeInsertComment(HTTPRequest $request)
  {
    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {
      $comment = new Comment([
        'chapters' => $request->getData('chapters'),
        'auteur' => $request->postData('auteur'),
        'content' => $request->postData('content')
      ]);
    }
    else
    {
      $comment = new Comment;
    }

    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');
      
      $this->app->httpResponse()->redirect('chapters-'.$request->getData('chapters').'.html');
    }

    $this->page->addVar('comment', $comment);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajout d\'un commentaire');
  }
}