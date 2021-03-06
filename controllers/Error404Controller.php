<?php

class Error404Controller extends MasterController
{

    public function index(Exception $exception = null) {
        $view = new View('404');
        $message = '';
        if(!is_null($exception))
            $message = $exception->getMessage();
        $view->throw404(array('message' => $message));
    }

}

