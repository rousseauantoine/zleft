<?php

class AjaxIndexController extends Controller
{
    private $json;

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
        $nb = Model::getInstance('Entry')->getNumberEntries();
        $this->json['output'] = $this->render('ajaxNumberEntries', array('nb' => $nb), true);
    }

}

