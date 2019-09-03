<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Chapters;

abstract class ChaptersManager extends Manager
{
  /**
   * Méthode permettant d'ajouter une chapters.
   * @param $chapters Chapters La chapters à ajouter
   * @return void
   */
  abstract protected function add(Chapters $chapters);
  
  /**
   * Méthode permettant d'enregistrer une chapters.
   * @param $chapters Chapters la chapters à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function save(Chapters $chapters)
  {
    if ($chapters->isValid())
    {
      $chapters->isNew() ? $this->add($chapters) : $this->modify($chapters);
    }
    else
    {
      throw new \RuntimeException('Le chapitre doit être validée pour être enregistrée');
    }
  }

  /**
   * Méthode renvoyant le nombre de chapters total.
   * @return int
   */
  abstract public function count();

  /**
   * Méthode permettant de supprimer une chapters.
   * @param $id int L'identifiant du chapitre à supprimer
   * @return void
   */
  abstract public function delete($id);

  /**
   * Méthode retournant une liste de chapters demandée.
   * @param $start int Le premier chapitre à sélectionner
   * @param $limite int Le nombre de chapitres à sélectionner
   * @return array La liste des chapitres. Chaque entrée est une instance de Chapters.
   */
  abstract public function getList($start = -1, $limite = -1);
  
  /**
   * Méthode retournant une chapters précise.
   * @param $id int L'identifiant de la chapters à récupérer
   * @return Chapters La chapters demandée
   */
  abstract public function getUnique($id);

  abstract public function getLast();

  /**
   * Méthode permettant de modifier une chapters.
   * @param $chapters chapters la chapters à modifier
   * @return void
   */
  abstract protected function modify(Chapters $chapters);

  abstract protected function file();
}