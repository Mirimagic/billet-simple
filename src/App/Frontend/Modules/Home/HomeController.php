<?php
namespace App\Frontend\Modules\Home;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Comment;
use OCFram\PDOFactory;
use OCFram\Paginator;

class HomeController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $numberChapters = $this->app->config()->get('number_chapters');
    $numberCaracters = $this->app->config()->get('number_caracters');

    // On récupère le manager des chapters.
    $manager = $this->managers->getManagerOf('Chapters');

    $listeChapters = $manager->getList(0, $numberChapters);
    $lastChapter = $manager->getLast();

    foreach ($listeChapters as $chapters)
    {
      if (strlen($chapters->content()) > $numberCaracters)
      {
        $start = substr($chapters->content(), 0, $numberCaracters);
        $start = substr($start, 0, strrpos($start, ' ')) . '...';

        $chapters->setContent($start);
      }
    }

    // On ajoute la variable $listeChapters à la vue.
    $this->page->addVar('listeChapters', $listeChapters);
    $this->page->addVar('lastChapter', $lastChapter);
    $this->page->addVar('title', 'Accueil');
  }

  public function executeShowAll(HTTPRequest $request)
  {
    $mysqli = PDOFactory::getMysqlConnexion();
    $query = 'SELECT id, chapterNumber, title, content, DATE_FORMAT(dateAdd, \'%d/%m/%Y à %Hh%i\') AS dateAddFr, DATE_FORMAT(dateUpdate, \'%d/%m/%Y à %Hh%i\') AS dateUpdateFr, image FROM chapters ORDER BY id DESC';

    $limit = (isset($_GET['limit'])) ? $_GET['limit'] : 5;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $links = 5;

    $paginator = new Paginator($mysqli, $query);
    $results = $paginator->getData($limit, $page);

    $this->page->addVar('title', 'Tous les chapitres');
    $this->page->addVar('paginator', $paginator);
    $this->page->addVar('links', $links);
    $this->page->addVar('results', $results);

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
    if ($request->postExists('author'))
    {
      $comment = new Comment([
        'chapters' => $request->getData('chapters'),
        'author' => $request->postData('author'),
        'content' => $request->postData('content')
      ]);


      if ($comment->isValid())
      {
        $this->managers->getManagerOf('Comments')->save($comment);

        $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');

        $this->app->httpResponse()->redirect('chapitre-'.$request->getData('chapters').'.html');
      }
      else
      {
        $this->page->addVar('erreurs', $comment->erreurs());
      }
    }
  }

  public function executeAbout()
  {

  }

  public function executeReported(HTTPRequest $request)
  {
    $this->managers->getManagerOf('Comments')->reported($request->getData('id'));

    $commentaire = $this->managers->getManagerOf('Comments')->get($request->getData('id'));

    $this->app->user()->setFlash('Le commentaire à bien été signalé');

    $this->app->httpResponse()->redirect('chapitre-'.$commentaire->chapters().'.html');
  }

  public function executeDeleteComment(HTTPRequest $request)
  {
    $commentaire = $this->managers->getManagerOf('Comments')->get($request->getData('id'));

    $this->managers->getManagerOf('Comments')->delete($request->getData('id'));

    $this->app->user()->setFlash('Le commentaire a bien été supprimé !');

    $this->app->httpResponse()->redirect('chapitre-'.$commentaire->chapters().'.html');
  }
}
