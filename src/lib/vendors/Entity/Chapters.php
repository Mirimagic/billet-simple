<?php
namespace Entity;

use \OCFram\Entity;

class Chapters extends Entity
{
  protected $chapterNumber,
            $title,
            $content,
            $dateAdd,
            $dateUpdate,
            $image;

  const TITLE_INVALIDE = 1;
  const CONTENT_INVALIDE = 2;

  public function isValid()
  {
    return (!empty($this->title) && !empty($this->content));
  }


  // SETTERS //

  public function setChapterNumber($chapterNumber)
  {
    $this->chapterNumber = $chapterNumber;
  }

  public function setTitle($title)
  {
    if (!is_string($title) || empty($title))
    {
      $this->erreurs[] = self::TITLE_INVALIDE;
    }

    $this->title = $title;
  }

  public function setContent($content)
  {
    if (!is_string($content) || empty($content))
    {
      $this->erreurs[] = self::CONTENT_INVALIDE;
    }

    $this->content = $content;
  }

  public function setDateAdd(\DateTime $dateAdd)
  {
    $this->dateAdd = $dateAdd;
  }

  public function setDateUpdate(\DateTime $dateUpdate)
  {
    $this->dateUpdate = $dateUpdate;
  }

  public function setImage($image)
  {
    $this->image = $image;
  }

  // GETTERS //

  public function chapterNumber()
  {
    return $this->chapterNumber;
  }

  public function title()
  {
    return $this->title;
  }

  public function content()
  {
    return $this->content;
  }

  public function dateAdd()
  {
    return $this->dateAdd;
  }

  public function dateUpdate()
  {
    return $this->dateUpdate;
  }

  public function image()
  {
    return $this->image;
  }
}
