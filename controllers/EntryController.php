<?php

class EntryController extends Controller
{

    public function index() {
        $idEntry = $this->request->getParameter('id');
        $this->returnEntry($idEntry);
    }

	// Displays the entry of id $idEntry
	public function returnEntry($idEntry) 
	{
		$entry      = Model::getInstance('Entry')->getEntry($idEntry);
		$comments   = Model::getInstance('Comment')->getComments($idEntry);
        $this->render('entry', array('entry' => $entry, 'comments' => $comments));
	}

}

