<?php

require_once 'core/Model.php';

class Error404Model extends Model
{

    public function getDidYouMean404($infoInUrl)
    {
        $sql = "SELECT ent_id, ent_title
				FROM entry
				WHERE ent_title LIKE ? ";
        $results = $this->executeSQL($sql, array("%$infoInUrl%"));
        return $results;
    }

}

