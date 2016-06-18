<?php

require_once 'models/EntryModel.php';

class AjaxHomeController extends Controller
{

    private $entry;
    private $json;

    public function __construct()
    {
        $this->entry = new EntryModel();
    }

    //dispatch of the actions
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

    // Displays the entry of id $idEntry
    public function getNumberEntries()
    {
        $nb = $this->entry->getNumberEntries();
        $output = $this->render('ajaxNumberEntries', array('nb' => $nb), true);
        $this->json['output'] = $output;
    }

}

