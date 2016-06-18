<?php

require_once 'models/EntryModel.php';

class HomeController extends Controller
{

	private $entry;


	public function __construct() 
	{
		$this->entry = new EntryModel();
	}


	// Displays all the entries
	function returnAllEntries() 
	{
		$entries = $this->entry->getEntries();
		$this->render('home', array('entries' => $entries));
	}


	function index()
	{
		$this->returnAllEntries();
	}

}

