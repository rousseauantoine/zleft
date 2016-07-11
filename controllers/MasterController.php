<?php

abstract class MasterController extends Controller
{

    //Executed right before executeAction()
    public function preExecution($request){
        parent::preExecution($request);

        if(!isset($_SESSION['user'])){
            $_SESSION['user'] = array();
            $_SESSION['user']['id'] = 1;
        }

        if(!isset($_SESSION['user']['acl'])){
            $_SESSION['user']['acl'] = Model::getInstance('Admin')->getAcls();
        }

        if(!$this->isUserAllowedToAccessResource($request->getParameter('ctrl') . '/' . $request->getParameter('action'))){
            throw new Exception('not allowed to access resource');
        }
    }

    //Executed right after executeAction()
    public function postExecution($request){

    }
}

