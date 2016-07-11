<?php

require_once 'core/Model.php';

class EntryModel extends Model
{

	// Returns the list of the entries
	public function getEntries() 
	{
		$sql = 'SELECT ent_id, ent_title, ent_body, ent_date
				FROM entry';
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

    public function getTest(){
        $sql = 'SELECT zleft_acl_resources.label
				FROM zleft_acl_users
				INNER JOIN zleft_acl_users2groups ON zleft_acl_users.id = zleft_acl_users2groups.user_id
				INNER JOIN zleft_acl_groups2resources ON zleft_acl_users2groups.group_id = zleft_acl_groups2resources.group_id
				INNER JOIN zleft_acl_resources ON zleft_acl_groups2resources.resource_id = zleft_acl_resources.id
				WHERE zleft_acl_users.id = ?';
        return $this->executeSQL($sql, array($_SESSION['user']['id']));
    }
}

