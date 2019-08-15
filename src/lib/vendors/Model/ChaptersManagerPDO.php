<?php
namespace Model;

use \Entity\Chapters;

class ChaptersManagerPDO extends ChaptersManager
{
  protected function add(Chapters $Chapter)
  {
    $requete = $this->dao->prepare('INSERT INTO chapters SET chapterNumber = :chapterNumber, title = :title, content = :content, dateAdd = NOW(), dateUpdate = NOW()');
    
    $requete->bindValue(':title', $Chapter->title());
    $requete->bindValue(':content', $Chapter->content());
    
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
    $sql = 'SELECT id, chapterNumber, title, content, DATE_FORMAT(dateAdd, \'%d/%m/%Y à %Hh%i\') AS dateAddFr, DATE_FORMAT(dateUpdate, \'%d/%m/%Y à %Hh%i\') AS dateUpdateFr FROM chapters ORDER BY id DESC';
    
    if ($start != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $start;
    }
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Chapters');
    
    $listeChapters = $requete->fetchAll();
    
    foreach ($listeChapters as $Chapter)
    {
      $Chapter->setDateAdd(new \DateTime($Chapter->DateAdd()));
      $Chapter->setDateUpdate(new \DateTime($Chapter->dateUpdate()));
    }
    
    $requete->closeCursor();
    
    return $listeChapters;
  }
  
  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, chapterNumber, title, content, DATE_FORMAT(dateAdd, \'%d/%m/%Y à %Hh%i\') AS dateAddFr, DATE_FORMAT(dateUpdate, \'%d/%m/%Y à %Hh%i\') AS dateUpdateFr FROM chapters WHERE id = :id');
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