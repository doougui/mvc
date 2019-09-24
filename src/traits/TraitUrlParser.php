<?php 
	namespace Src\Traits;

	trait TraitUrlParser {
		// Splits the URL into an array
		public function parseUrl() {
			$url = '/';
			$parsedUrl = array();

			if (isset($_GET['url'])) {
				$url .= $_GET['url'];
			}
			
			$url = explode('/', $url);

			foreach ($url as $urlItem) {
				if (!empty($urlItem) && $urlItem != '/') {
					$parsedUrl[] .= $urlItem;
				}
			}

			return $parsedUrl;
		}
	}