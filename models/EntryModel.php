<?php

require_once 'core/Model.php';

class EntryModel extends Model
{

	// Returns the list of the entries
	public function getEntries() 
	{
		$sql = 'SELECT ent_id, ent_title, ent_body, ent_date
				FROM entry ';
		$entries = $this->executeSQL($sql);
		return $entries;
	}


	// Returns an entry
	public function getEntry($id) 
	{
		$sql = 'SELECT ent_id, ent_title, ent_body, ent_date
				FROM entry 
				WHERE ent_id = ?';
		$entry = $this->executeSQL($sql, array($id));
		if (count($entry) == 1)
			return array_shift($entry);
		else
			throw new Exception("No entry corresponding to id $id");
	}

    public function getNumberEntries(){
        $sql = 'SELECT COUNT(ent_id) AS nb
				FROM entry';
        $result = $this->executeSQL($sql);
        $result = array_shift($result);
        $nb = $result['nb'];
        return $nb;
    }
}

