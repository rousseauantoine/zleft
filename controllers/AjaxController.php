<?php

require_once 'models/EntryModel.php';
require_once 'core/Controller.php';

class AjaxController extends Controller
{

	private $entry;
    private $json;

	public function __construct() 
	{
		$this->entry = new EntryModel();
	}


	// Displays the entry of id $idEntry
	public function getNumberEntries()
	{
		$nb = $this->entry->getNumberEntries();
		$output = $this->render('ajaxNumberEntries', array('nb' => $nb), true);
        $this->json['output'] = $output;
	}


	public function index() {
		$do = $this->request->getParameter('do');
        switch($do){
            case 'getNumberEntries':
                $this->getNumberEntries();
                break;
            default:
                break;
        }
        echo json_encode($this->json);
        exit;
	}

}

