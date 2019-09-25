<?php 
	namespace Src\Traits;

	trait TraitUrlParser {
		// Splits the URL into an array
		public function parseUrl() {
			$url = '/';

			if (isset($_GET['url'])) {
				$url .= $_GET['url'];
			}
			
			$url = array_values(array_filter(explode('/', $url)));

			return $url;
		}
	}