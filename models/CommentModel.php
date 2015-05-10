<?php

require_once 'core/Model.php';

class CommentModel extends Model
{

	// Returns all the comments associated with an entry
	public function getComments($idEntry) 
	{
		$sql = 'SELECT com_id, com_author, com_body, com_date
				FROM comment
				WHERE ent_id = ?';
		$comments = $this->executeSQL($sql, array($idEntry));
		return $comments;
	}

}

