<?php

trait Core_ViewHelper
{
    
    public function clean($value)
    {
        return strip_tags($value);
    }

    public function isUserConnected()
    {
        return ($_SESSION['user']['id'] != 1);
    }

    public function isUserAllowedToAccessResource($resource){
        return in_array($resource, $_SESSION['user']['acl']);
    }
}

