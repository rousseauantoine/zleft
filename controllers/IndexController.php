<?php

class IndexController extends MasterController
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
		$this->render('index', array('entries' => $entries));
        var_dump($_SESSION);
	}

}

