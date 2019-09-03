<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Comment;

abstract class CommentsManager extends Manager
{
  /**
   * Méthode permettant d'ajouter un commentaire.
   * @param $comment Le commentaire à ajouter
   * @return void
   */
  abstract protected function add(Comment $comment);

  /**
   * Méthode permettant de supprimer un commentaire.
   * @param $id L'identifiant du commentaire à supprimer
   * @return void
   */
  abstract public function delete($id);

  /**
   * Méthode permettant de supprimer tous les commentaires liés à un chapitre.
   * @param $chapters L'identifiant de la chapters dont les commentaires doivent être supprimés
   * @return void
   */
  abstract public function deleteFromChapters($chapters);

  abstract public function reported($id);

  abstract public function unreported($id);
  
  /**
   * Méthode permettant d'enregistrer un commentaire.
   * @param $comment Le commentaire à enregistrer
   * @return void
   */
  public function save(Comment $comment)
  {
    if ($comment->isValid())
    {
      $this->add($comment);
    }
    else
    {
      throw new \RuntimeException('Le commentaire doit être validé pour être enregistré');
    }
  }
  
  /**
   * Méthode permettant de récupérer une liste de commentaires.
   * @param $chapters Le chapitre sur laquelle on veut récupérer les commentaires
   * @return array
   */
  abstract public function getListOf($chapters);

  /**
   * Méthode permettant de récupérer une liste de commentaires.
   * @param $start int Le premier commentaire à sélectionner
   * @param $limite int Le nombre de commentaires à sélectionner
   * @return array La liste des commentaires. Chaque entrée est une instance de Comments.
   */
  abstract public function getListComments($start = -1, $limite = -1);

  /**
   * Méthode permettant de récupérer une liste de commentaires signalé.
   * @return array La liste des commentaires signalé. Chaque entrée est une instance de Comments.
   */
  abstract public function getListCommentsReported();
  
  /**
   * Méthode permettant d'obtenir un commentaire spécifique.
   * @param $id L'identifiant du commentaire
   * @return Comment
   */
  abstract public function get($id);

  /**
   * Méthode renvoyant le nombre de commentaires signalés au total.
   * @return int
   */
  abstract public function countReported();
}