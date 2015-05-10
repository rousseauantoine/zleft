<?php
//pattern singleton
class Configuration
{

	private static $configParameters;


	// Returns the value of configuration parameter
	public static function get($name, $defaultValue = null) 
	{
        $configParameters = self::getConfigParameters();
		if (isset($configParameters[$name]))
			return ($configParameters[$name]);
		else
			return $defaultValue;
	}


	// Returns the array of the parameters while loading if needed
	private static function getConfigParameters()
	{
		if (self::$configParameters == null)
            self::$configParameters = parse_ini_file("config/config.ini");
		return self::$configParameters;
	}

}

