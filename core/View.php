<?php

require_once 'Configuration.php';
require_once 'plugins/htmlpurifier/HTMLPurifier.standalone.php';

//Class managing the generation of the views 
class View 
{

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

    // Object used to sanitize HTML upon display
    private $purifier;

    // Configuration of the purifier
    private $configPurifier;


	public function __construct($action)
	{
        $this->filename = 'views/' . $action . 'View.php';

        $this->configurePurifier();
        $this->purifier = new HTMLPurifier($this->configPurifier);
	}


    // Set options to the purifier
    public function configurePurifier(){
        // http://htmlpurifier.org/live/configdoc/plain.html
        $this->configPurifier = HTMLPurifier_Config::createDefault();

        // If enabled, nofollow rel attributes are added to all outgoing links.
        $this->configPurifier->set('HTML.Nofollow', true);

        // Whitelist that defines the schemes that a URI is allowed to have.
        $this->configPurifier->set('URI.AllowedSchemes', array (
            'http' => true,
            'https' => true
        ));

        // Whitelist of allowed tags
        $this->configPurifier->set('HTML.AllowedElements', 'a,p,div,ul,li,blockquote,span,h1,h2,h3,h4,h5,h6,i,br,del,sub,sup,table,tr,td,img');

        // Set attributes for each tag
        $this->configPurifier->set('HTML.AllowedAttributes', 'a.href,a.title,td.colspan,td.rowspan,img.src,img.alt');
    }


	// Generates and displays the view
	public function generateView($data)
	{
		// Specific part of the view
		$content = $this->generateFile($this->filename, $data);
		$root = Configuration::get("root", "/");

		//Include in the common layout
		$view = $this->generateFile('views/layout.php',	array('viewTitle' => $this->viewTitle, 'css' => $this->css,
				                    'js' => $this->js, 'meta' => $this->meta, 'content' => $content, 'root' => $root));
		echo $view;
	}


    // Generates and displays the view asked by an ajax call
    public function generateAjaxView($data)
    {
        return $this->generateFile($this->filename, $data);
    }

    // Generates and displays the 404
    public function throw404($data)
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


    // Cleans a user entry
    private function clean($value)
    {
        return $this->purifier->purify($value);
    }

}

