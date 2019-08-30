<?php
namespace App\Backend\Modules\Chapters;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Chapters;
/* use \Entity\Comment; */

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
    $numberChapters = $this->app->config()->get('number_chapters');

    $this->page->addVar('title', 'Administration');

    $manager = $this->managers->getManagerOf('Chapters');

    $this->page->addVar('listeChapters', $manager->getList(0, $numberChapters));
    $this->page->addVar('numberChapters', $manager->count());
  }

  public function executeInsert(HTTPRequest $request)
  {
    if ($request->postExists('title'))
    {
      $this->processForm($request);
    }

    $this->page->addVar('title', 'Ajout du chapitre');
  }

  public function executeUpdate(HTTPRequest $request)
  {
    if($request->postExists('title'))
    {
      $this->processForm($request);
    }
    else
    {
      $this->page->addVar('chapters', $this->managers->getManagerOf('Chapters')->getUnique($request->getData('id')));
    }

    $this->page->addVar('title', 'Modification du chapitre');
  }

  public function processForm(HTTPRequest $request)
  {
    $chapters = new Chapters([
      'chapterNumber' => $request->postData('chapterNumber'),
      'title' => $request->postData('title'),
      'content' => $request->postData('content')
    ]);
 
    // L'identifiant du chapitre est transmis si on veut la modifier.
    if ($request->postExists('id'))
    {
      $chapters->setId($request->postData('id'));
    }
 
    if ($chapters->isValid())
    {
      $this->managers->getManagerOf('Chapters')->save($chapters);
 
      $this->app->user()->setFlash($chapters->isNew() ? 'Le chapitre a bien été ajouté !' : 'Le chapitre a bien été modifié !');
    }
    else
    {
      $this->page->addVar('erreurs', $chapters->erreurs());
    }
 
/*     $this->page->addVar('chapters', $chapters);*/  
  }
}