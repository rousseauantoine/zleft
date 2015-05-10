<?php

require_once 'Configuration.php';

abstract class Model
{

	private static $db;


	// Executes an eventually prepared request
	protected function executeSQL($sql, $params = null)
	{
		if ($params == null)
			$results = self::getDB()->query($sql);
		else {
			$results = self::getDB()->prepare($sql);
			$results->execute($params);
		}
        return ($results->fetchAll(PDO::FETCH_ASSOC));
	}


	// Connexion to the database
	private function getDB() 
	{
		if (self::$db === null) {
			$dsn 	= Configuration::get("dsn");
			$login 	= Configuration::get("login");
			$pwd 	= Configuration::get("pwd");
			self::$db = new PDO($dsn, $login, $pwd, 
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		return self::$db;
	}

}

