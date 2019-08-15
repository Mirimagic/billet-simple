<?php
namespace Entity;

use \OCFram\Entity;

class Comment extends Entity
{
  protected $chapters,
            $auteur,
            $content,
            $date;

  const AUTEUR_INVALIDE = 1;
  const CONTENU_INVALIDE = 2;

  public function isValid()
  {
    return !(empty($this->auteur) || empty($this->content));
  }

  public function setChapters($chapters)
  {
    $this->chapters = (int) $chapters;
  }

  public function setAuteur($auteur)
  {
    if (!is_string($auteur) || empty($auteur))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }

    $this->auteur = $auteur;
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

  public function auteur()
  {
    return $this->auteur;
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