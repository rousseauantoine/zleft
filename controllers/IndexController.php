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
		$this->view['entries'] =  $entries;
	}

}

