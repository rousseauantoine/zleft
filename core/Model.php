<?php

require_once 'Configuration.php';

abstract class Model
{

	private static $db;


	// Executes an eventually prepared request
	protected static function executeSQL($sql, $params = null, $fetch_style = 'ASSOC')
	{
        if(!in_array($fetch_style, array('ASSOC', 'CLASS', 'COLUMN'))){
            throw new Exception("Fetch style '$fetch_style' not known");
        }
		if ($params == null)
			$results = self::getDB()->query($sql);
		else {
			$results = self::getDB()->prepare($sql);
			$results->execute($params);
		}
        return ($results->fetchAll(constant('PDO::FETCH_'. $fetch_style)));
	}


	// Connexion to the database
	private static function getDB()
	{
		if (self::$db === null) {
			$dsn 	= Configuration::get("dsn");
			$login 	= Configuration::get("login");
			$pwd 	= Configuration::get("pwd");
			self::$db = new PDO($dsn, $login, $pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		return self::$db;
	}

    public static function getInstance($modelName){
        $modelClass = $modelName . 'Model';
        $modelFile = 'models/' . $modelClass . '.php';

        if (file_exists($modelFile)) {
            require_once($modelFile);
            return new $modelClass();
        }
        else
            throw new Exception("File '$modelClass' not found");
    }

    public static function isUserAllowedToAccessResource($resource){
        return in_array($resource, $_SESSION['user']['acl']);
    }

}

