<?php

require_once 'models/Error404Model.php';
require_once 'core/Controller.php';

class Error404Controller extends Controller
{

    private $error404;

    public function __construct()
    {
        $this->error404 = new Error404Model();
    }


    // Displays the entry of id $idEntry
    public function getDidYouMean($infoInUrl)
    {
        $didYouMean = $this->error404->getDidYouMean404($infoInUrl);
        $view = new View('404');
        $view->throw404(array('didYouMean' => $didYouMean));
    }


    // Displays the entry of id $idEntry
    public function devMode(Exception $exception)
    {
        $view = new View('404');
        $view->throw404(array('message' => $exception->getMessage()));
    }


    public function index() {
        $infoInUrl = $this->request->getParameter('ctrl');
        $this->getDidYouMean($infoInUrl);
    }

}

