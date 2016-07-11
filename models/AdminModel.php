<?php

require_once 'core/Model.php';

class AdminModel extends Model
{

	public function auth($login, $password)
	{
		$sql = 'SELECT id
				FROM zleft_acl_users
				WHERE login = ? AND password = ?';
		return $this->executeSQL($sql, array($login, $password));
	}

    public function getAcls()
    {
        $sql = 'SELECT zleft_acl_resources.label
				FROM zleft_acl_users
				INNER JOIN zleft_acl_users2groups ON zleft_acl_users.id = zleft_acl_users2groups.user_id
				INNER JOIN zleft_acl_groups2resources ON zleft_acl_users2groups.group_id = zleft_acl_groups2resources.group_id
				INNER JOIN zleft_acl_resources ON zleft_acl_groups2resources.resource_id = zleft_acl_resources.id
				WHERE zleft_acl_users.id = ?';
        return $this->executeSQL($sql, array($_SESSION['user']['id']), 'COLUMN');
    }

}

