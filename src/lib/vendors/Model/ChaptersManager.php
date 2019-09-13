<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Chapters;

abstract class ChaptersManager extends Manager
{
  /**
   * Method for add a chapter
   * @param $chapters Chapters to add
   * @return void
   */
  abstract protected function add(Chapters $chapters);

  /**
   * Method for save a chapter
   * @param $chapters Chapters to save
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
   * Method returning the total number of chapters
   * @return int
   */
  abstract public function count();

  /**
   * Method for delete a chapter
   * @param $id int Id form the chapter to delete
   * @return void
   */
  abstract public function delete($id);

  /**
   * Method returning the chapters ask
   * @param $start int First chapters select
   * @param $limite int Number of chapters to select
   * @return array The list of chapters. Every entry is an instance of Chapter.
   */
  abstract public function getList($start = -1, $limite = -1);

  /**
   * Method returning the chapter select
   * @param $id int Id of the chapter to select
   * @return Chapters The chapter ask
   */
  abstract public function getUnique($id);


  /**
   * Methode returning the last chapter creat
   * @return mixed
   */
  abstract public function getLast();

  /**
   * Method for update the chapter
   * @param $chapters chapters the chapter to update
   * @return void
   */
  abstract protected function modify(Chapters $chapters);
}
