<?php

require_once 'Configuration.php';
require_once 'views/helper/ViewHelper.php';
//TODO je m'explique pas pourquoi, pour les require_once une fois on part de core et l'autre de views?

//Class managing the generation of the views 
class View 
{
    use Core_ViewHelper;

	// Name of the file associated with the the view
	private $filename;

	// Title of the view
	private $viewTitle;

    // Meta tags
    private $meta = array();

	// Special css file for a view
	private $css = array();

	// Special js file for a view
	private $js = array();


	public function __construct($action)
	{
        $this->filename = 'views/' . $action . 'View.php';
	}

	// Generates and displays the view
	public function generateView($data, $ajax)
	{
		// Specific part of the view
		$content = $this->generateFile($this->filename, $data);
        if($ajax) {
            return $content;
        }
        else {
            //Include in the common layout
            $content = $this->generateFile('views/layout.php', array('viewTitle' => $this->viewTitle, 'css' => $this->css,
                'js' => $this->js, 'meta' => $this->meta, 'content' => $content, 'root' => Configuration::get("root", "/")));
        }
		echo $content;
	}

    // Generates and displays the 404
    public function throw404($data = array())
    {
        $data['root'] = Configuration::get('root', '/');
        $view = $this->generateFile('views/404.php', $data);
        header('HTTP/1.0 404 Not Found');
        echo $view;
    }

	// Generates a view file and returns the result
	private function generateFile($filename, $data) 
	{
		if (file_exists($filename)) {
			// extract() creates a variable for each index in the $data array() and assign its value
            // can be removed but will have to use $data['index'] in the view file
			extract($data);
			ob_start();
			require $filename;
			return ob_get_clean();
		}
		else
			throw new Exception("$filename not found");
	}

}

