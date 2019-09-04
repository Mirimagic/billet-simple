<?php
namespace Model;

use \Entity\Chapters;

class ChaptersManagerPDO extends ChaptersManager
{
  protected function add(Chapters $chapters)
  {
    $requete = $this->dao->prepare('INSERT INTO chapters SET chapterNumber = :chapterNumber, title = :title, content = :content, dateAdd = NOW(), dateUpdate = NOW()');
    
    $requete->bindValue(':chapterNumber', $chapters->chapterNumber());
    $requete->bindValue(':title', $chapters->title());
    $requete->bindValue(':content', $chapters->content());
    
    $requete->execute();
  }

  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM chapters')->fetchColumn();
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM chapters WHERE id = '.(int) $id);
  }

  public function getList($start = -1, $limite = -1)
  {
    $sql = 'SELECT id, chapterNumber, title, content, dateAdd, dateUpdate FROM chapters ORDER BY id DESC';
    
    if ($start != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $start;
    }
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Chapters');
    
    $listeChapters = $requete->fetchAll();
    
    foreach ($listeChapters as $chapters)
    {
      $chapters->setDateAdd(new \DateTime($chapters->DateAdd()));
      $chapters->setDateUpdate(new \DateTime($chapters->dateUpdate()));
    }
   
    $requete->closeCursor();
    
    return $listeChapters;
  }
  
  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, chapterNumber, title, content, dateAdd, dateUpdate FROM chapters WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
    
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Chapters');
    
    if ($chapters = $requete->fetch())
    {
      $chapters->setDateAdd(new \DateTime($chapters->DateAdd()));
      $chapters->setDateUpdate(new \DateTime($chapters->dateUpdate()));
      
      return $chapters;
    }
    return null;
  }

  public function getLast()
  {
    $requete = $this->dao->prepare('SELECT id, chapterNumber, title, content, dateAdd, dateUpdate FROM chapters ORDER BY id DESC LIMIT 1');
    $requete->execute();

    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Chapters');

    if ($lastchapters = $requete->fetch())
    {
      $lastchapters->setDateAdd(new \DateTime($lastchapters->DateAdd()));
      $lastchapters->setDateUpdate(new \DateTime($lastchapters->dateUpdate()));

      return $lastchapters;
    }
    return null;
  }

  public function modify(Chapters $chapters)
  {
    $requete = $this->dao->prepare('UPDATE chapters SET chapterNumber = :chapterNumber, title = :title, content = :content, dateUpdate = NOW() WHERE id = :id');
    
    $requete->bindValue(':title', $chapters->title());
    $requete->bindValue(':chapterNumber', $chapters->chapterNumber());
    $requete->bindValue(':content', $chapters->content());
    $requete->bindValue(':id', $chapters->id(), \PDO::PARAM_INT);
    
    $requete->execute();
  }

  public function pagination()
  {
    $mysqli = $this->dao;
    $query = 'SELECT id, chapterNumber, title, content, dateAdd, dateUpdate FROM chapters ORDER BY id DESC';

    $limit = (isset($_GET['limit'])) ? $_GET['limit'] : 5;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $links = 5;

    $paginator = new Paginator($mysqli, $query);
    $results = $paginator->getData($limit, $page);
  }

  public function file()
  {
  echo ('<script>alert("Je suis dans la fonction")</script>');
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0)
    {
      echo ('<script>alert("Il ni a pas derreur")</script>');
      if ($_FILES['file']['size'] <= 1000000)
      {
        echo ('<script>alert("Je suis pas trop lourd")</script>');
        $infofile = pathinfo($_FILES['file']['name']);
        $extension_upload = $infofile['extension'];
        $extensions_authorized = array('jpg', 'jpeg', 'gif', 'png');

        if (in_array($extension_upload, $extensions_authorized))
        {
          echo ('<script>alert("Je dois être sauvé")</script>');
          move_uploaded_file($_FILES['file']['tmp_name'], 'images/uploads/' . basename($_FILES['file']['name']));
          echo "L'envoi a bien été effectué !";
        }
      }
    }  
  }
}