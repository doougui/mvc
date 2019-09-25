<?php 
	namespace Src\Classes;

	class ClassRender {
		
		// Properties
		private $dir;
		private $title;
		private $description;
		private $keywords;

		public function getDir() { return $this -> dir; }
		public function setDir($dir) { $this -> dir = $dir; }
		public function getTitle() { return $this -> title; }
		public function setTitle($title) { $this -> title = $title; }
		public function getDescription() { return $this -> description; }
		public function setDescription($description) { $this -> description = $description; }
		public function getKeywords() { return $this -> keywords; } 
		public function setKeywords($keywords) { $this -> keywords = $keywords; }

		// Method responsible for rendering layout
		public function renderLayout($data = []) {
			extract($data);
			include_once(DIRREQ.'app/Views/Layout.php');
		}

		// Add specific head features
		public function addExtraHead($data = []) {
			if (file_exists(DIRREQ."app/Views/{$this -> getDir()}/head.php")) {
				extract($data);
				include(DIRREQ."app/Views/{$this -> getDir()}/head.php");
			}
		}

		// Add specific header features
		public function addExtraHeader($data = []) {
			if (file_exists(DIRREQ."app/Views/{$this -> getDir()}/header.php")) {
				extract($data);
				include(DIRREQ."app/Views/{$this -> getDir()}/header.php");
			}
		}

		// Add main content
		public function addMainContent($data = []) {
			if (file_exists(DIRREQ."app/Views/{$this -> getDir()}/main.php")) {
				extract($data);
				include(DIRREQ."app/Views/{$this -> getDir()}/main.php");
			}
		}

		// Add specific footer features
		public function addExtraFooter($data = []) {
			if (file_exists(DIRREQ."app/Views/{$this -> getDir()}/footer.php")) {
				extract($data);
				include(DIRREQ."app/Views/{$this -> getDir()}/footer.php");
			}
		}
	}