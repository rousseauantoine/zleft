<?php

require_once 'models/EntryModel.php';
require_once 'models/CommentModel.php';
require_once 'core/Controller.php';

class EntryController extends Controller
{

	private $entry;

	private $comment;


	public function __construct() 
	{
		$this->entry = new EntryModel();
		$this->comment = new CommentModel();
	}


	// Displays the entry of id $idEntry
	public function returnEntry($idEntry) 
	{
		$entry      = $this->entry->getEntry($idEntry);
		$comments   = $this->comment->getComments($idEntry);
        $this->render('entry', array('entry' => $entry, 'comments' => $comments));
	}


	public function index() {
		$idEntry = $this->request->getParameter('id');
		$this->returnEntry($idEntry);
	}

}

