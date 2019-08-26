<?php
namespace App\Backend\Modules\Chapters;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Chapters;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\ChaptersFormBuilder;
use \OCFram\FormHandler;

class ChaptersController extends BackController
{
  public function executeDelete(HTTPRequest $request)
  {
    $chaptersId = $request->getData('id');
    
    $this->managers->getManagerOf('Chapters')->delete($chaptersId);
    $this->managers->getManagerOf('Comments')->deleteFromChapters($chaptersId);

    $this->app->user()->setFlash('Le chapitre a bien été supprimé !');

    $this->app->httpResponse()->redirect('.');
  }

  public function executeDeleteComment(HTTPRequest $request)
  {
    $this->managers->getManagerOf('Comments')->delete($request->getData('id'));
    
    $this->app->user()->setFlash('Le commentaire a bien été supprimé !');
    
    $this->app->httpResponse()->redirect('.');
  }

  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des chapitres');

    $manager = $this->managers->getManagerOf('Chapters');

    $this->page->addVar('listeChapters', $manager->getList());
    $this->page->addVar('numberChapters', $manager->count());
  }

  public function executeInsert(HTTPRequest $request)
  {
    $this->processForm($request);

    $this->page->addVar('title', 'Ajout d\'un chapitre');
  }

  public function executeUpdate(HTTPRequest $request)
  {
    $this->processForm($request);

    $this->page->addVar('title', 'Modification d\'un chapitre');
  }

  public function processForm(HTTPRequest $request)
  {
    $chapters = new Chapters([
      'author' => $request->postData('author'),
      'title' => $request->postData('title'),
      'content' => $request->postData('content')
    ]);
 
    // L'identifiant de la chapters est transmis si on veut la modifier.
    if ($request->postExists('id'))
    {
      $chapters->setId($request->postData('id'));
    }
 
    if ($chapters->isValid())
    {
      $this->managers->getManagerOf('Chapters')->save($chapters);
 
      $this->app->user()->setFlash($chapters->isNew() ? 'La chapters a bien été ajoutée !' : 'La chapters a bien été modifiée !');
    }
    else
    {
      $this->page->addVar('erreurs', $chapters->erreurs());
    }
 
    $this->page->addVar('chapters', $chapters);
  }
}