<?php
namespace Entity;

use \OCFram\Entity;

class Comment extends Entity
{
  protected $chapters,
            $author,
            $content,
            $date;

  const AUTEUR_INVALIDE = 1;
  const CONTENU_INVALIDE = 2;

  public function isValid()
  {
    return !(empty($this->author) || empty($this->content));
  }

  public function setChapters($chapters)
  {
    $this->chapters = (int) $chapters;
  }

  public function setAuteur($author)
  {
    if (!is_string($author) || empty($author))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }

    $this->author = $author;
  }

  public function setContent($content)
  {
    if (!is_string($content) || empty($content))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }

    $this->content = $content;
  }

  public function setDate(\DateTime $date)
  {
    $this->date = $date;
  }

  public function chapters()
  {
    return $this->chapters;
  }

  public function author()
  {
    return $this->author;
  }

  public function content()
  {
    return $this->content;
  }

  public function date()
  {
    return $this->date;
  }
}