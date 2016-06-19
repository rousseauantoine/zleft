<?php

class HomeController extends Controller
{

    function index()
    {
        $this->returnAllEntries();
    }

	// Displays all the entries
	function returnAllEntries() 
	{
        $model = Model::getInstance('Entry');
		$entries = $model->getEntries();
		$this->render('home', array('entries' => $entries));
	}

}

