<?php

class Request
{

	private $requestParameters;


	public function __construct($requestParameters)
	{
		$this->requestParameters = $requestParameters;
	}


	// Returns true if the parameter is in the request
	public function isSetParameter($name)
	{
		return (isset($this->requestParameters[$name]) && $this->requestParameters[$name] != "");
	}


	// Returns wanted parameter's value
	public function getParameter($name)
	{
		if ($this->isSetParameter($name))
			return $this->requestParameters[$name];
		else
			throw new Exception("Parameter '$name' not found in the request");
	}

}

