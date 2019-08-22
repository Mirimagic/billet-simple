<?php
namespace Model;

use \Entity\Chapters;

class ChaptersManagerPDO extends ChaptersManager
{
  protected function add(Chapters $chapter)
  {
    $requete = $this->dao->prepare('INSERT INTO chapters SET chapterNumber = :chapterNumber, title = :title, content = :content, dateAdd = NOW(), dateUpdate = NOW()');
    
    $requete->bindValue(':title', $chapter->title());
    $requete->bindValue(':content', $chapter->content());
    
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
    
    foreach ($listeChapters as $chapter)
    {
      $chapter->setDateAdd(new \DateTime($chapter->DateAdd()));
      $chapter->setDateUpdate(new \DateTime($chapter->dateUpdate()));
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

  protected function modify(Chapters $chapters)
  {
    $requete = $this->dao->prepare('UPDATE chapters SET chapterNumber = :chapterNumber, title = :title, content = :content, dateUpdate = NOW() WHERE id = :id');
    
    $requete->bindValue(':title', $chapters->title());
    $requete->bindValue(':chapterNumber', $chapters->chapterNumber());
    $requete->bindValue(':content', $chapters->content());
    $requete->bindValue(':id', $chapters->id(), \PDO::PARAM_INT);
    
    $requete->execute();
  }
}