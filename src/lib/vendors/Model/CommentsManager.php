<?php
namespace Model;

use \OCFram\Manager;
use \Entity\Comment;

abstract class CommentsManager extends Manager
{
  /**
   * Method for add a comment
   * @param Comment $comment The comment to add
   * @return void
   */
  abstract protected function add(Comment $comment);

  /**
   * Method to delete the comment
   * @param $id Id of the comment
   * @return void
   */
  abstract public function delete($id);

  /**
   * Method for delete all the comments of a chapter
   * @param $chapters Id of the chapter where delete the comments
   * @return void
   */
  abstract public function deleteFromChapters($chapters);

  /**
   * Add a state reported to the comment
   * @param $id Id of the Comment
   * @return mixed
   */
  abstract public function reported($id);

  /**
   * A a state unreported to the comment
   * @param $id Id of the Comment
   * @return mixed
   */
  abstract public function unreported($id);

  /**
   * Method to save a comment
   * @param Comment $comment The comment to save
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
   * Method for recover the comments
   * @param $chapters the chapter where the comment are
   * @return array
   */
  abstract public function getListOf($chapters);

  /**
   * Method for getting a list of comment
   * @param $start int First comment to recover
   * @param $limite int Number of comment to select
   * @return array the list of comments. Each entry is an instance of Comments.
   */
  abstract public function getListComments($start = -1, $limite = -1);

  /**
   * Method to retrieve a comment list reported.
   * @return array The list of comments reported. Each entry is an instance of Comments.
   */
  abstract public function getListCommentsReported();

  /**
   * Method for obtaining a specific comment.
   * @param $id Id of the comment
   * @return Comment
   */
  abstract public function get($id);

  /**
   * Method that returns the number of comments reported in total.
   * @return int
   */
  abstract public function countReported();
}
