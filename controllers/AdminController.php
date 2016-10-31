<?php

class AdminController extends MasterController
{

    function index()
    {
        if($_SESSION['user']['id'] == 1){
            if(isset($_POST['login']) && isset($_POST['password'])){
                //TODO: filter
                //TODO: hash and salt password
                //TODO: is a session destroyed when closing tab ? how to set the timeout ?
                $auth = Model::getInstance('Admin')->auth($_POST['login'], $_POST['password']);
                if(!empty($auth)){
                    $auth = array_shift($auth);
                    $_SESSION['user'] = array();
                    $_SESSION['user']['id'] = $auth['id'];
                    $this->redirect('/index/index');
                }else{
                    $invalidCredentials = $this->render('partials/invalidCredentials', array('signature' => 'team'), true);
                    $this->view = array('flash' => $invalidCredentials);
                }
            }
        }
    }

    function logout()
    {
        $_SESSION = array();
        session_destroy();

        $this->redirect('/index/index');
    }

}

