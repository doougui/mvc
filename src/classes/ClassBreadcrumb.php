<?php 
	namespace Src\Classes;

	class ClassBreadcrumb {
		use \Src\Traits\TraitUrlParser;

		// Create breadbrumbs
		public function addBreadcrumb($separator = ' &raquo; ', $home = 'Home') {

			// Gets the parsed URL
			$path = $this -> parseUrl(); 

			// Set the base url (it's the same variable set in config.php)
			$base = DIRPAGE; 

			// Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
			$breadcrumbs = array("<a href='".$base."'>".$home."</a>");

			// Find out the index for the last value in our path array
			$pathkeys = array_keys($path); 
			$last = end($pathkeys);

			// Build the rest of the breadcrumbs
			foreach ($path as $key => $crumb) {
				// Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
				$title = ucwords(str_replace(array('.php', '_', '-'), array('', ' ', ''), $crumb));
				
				// If the title isn't empty
    		if (!empty($title)) {
    			// If we are not on the last index, then display an <a> tag
	    		if ($key != $last) {
			    	$breadcrumbs[] = "<a href='".$base.$crumb."'>".$title."</a>";
	    		} else {
	    			// Otherwise, just display the title
						$breadcrumbs[] = $title;
					}
				} else {
					// $key = $key - 1;
				}
			}

			// Build our temporary array (pieces of bread) into one big string
	    return implode($separator, $breadcrumbs);
		}
	}