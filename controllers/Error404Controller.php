<?php

class Error404Controller extends Controller
{

    private $error404;

    public function __construct()
    {
    }

    public function index() {
        $view = new View('404');
        $view->throw404();
    }

    // Displays the entry of id $idEntry
    public function devMode(Exception $exception)
    {
        $view = new View('404');
        $view->throw404(array('message' => $exception->getMessage()));
    }

}

