<?php

class AjaxIndexController extends MasterController
{
    private $json;

    public function index(){}

    // Displays the entry of id $idEntry
    public function getNumberEntries()
    {
        $nb = Model::getInstance('Entry')->getNumberEntries();
        $this->json['output'] = $this->render('ajaxNumberEntries', array('nb' => $nb), true);
        return (json_encode($this->json));
    }

}

