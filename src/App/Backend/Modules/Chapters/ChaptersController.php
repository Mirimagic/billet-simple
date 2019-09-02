<?php
namespace App\Backend\Modules\Chapters;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Chapters;
/* use \Entity\Comment; */

class ChaptersController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $numberChapters = $this->app->config()->get('number_chapters');
    $numberComments = $this->app->config()->get('number_comments');
    $numberCaracters = $this->app->config()->get('number_caracters');

    $this->page->addVar('title', 'Administration');

    $managerChapters = $this->managers->getManagerOf('Chapters');
    $managerComments = $this->managers->getManagerOf('Comments');

    $listeComments = $managerComments->getListComments(0, $numberComments);

    foreach ($listeComments as $comment)
    {
      if (strlen($comment->content()) > $numberCaracters)
      {
        $start = substr($comment->content(), 0, $numberCaracters);
        $start = substr($start, 0, strrpos($start, ' ')) . '...';
        
        $comment->setContent($start);
      }
    }

    $this->page->addVar('listeChapters', $managerChapters->getList(0, $numberChapters));
    $this->page->addVar('listeComments', $listeComments);
    $this->page->addVar('numberReportedComments', $managerComments->countReported());
  }

  public function executeChaptersList(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des chapitres');

    $manager = $this->managers->getManagerOf('Chapters');

    $this->page->addVar('listeChapters', $manager->getList());
  }

  public function executeCommentsList(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des commentaires');

    $managerComments = $this->managers->getManagerOf('Comments');

    $this->page->addVar('numberReportedComments', $managerComments->countReported());
    $this->page->addVar('listeComments', $managerComments->getListCommentsReported());
  }

  public function executeInsert(HTTPRequest $request)
  {
    if ($request->postExists('title'))
    {
      $this->processForm($request);
    }

    $this->page->addVar('title', 'Ajouter un chapitre');
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
      $this->managers->getManagerOf('Chapters')->file();
 
      $this->app->user()->setFlash($chapters->isNew() ? 'Le chapitre a bien été ajouté !' : 'Le chapitre a bien été modifié !');
    }
    else
    {
      $this->page->addVar('erreurs', $chapters->erreurs());
    }
 
/*     $this->page->addVar('chapters', $chapters);*/  
  }
  
}