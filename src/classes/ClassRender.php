<?php 
	namespace Src\Classes;

	class ClassRender {

		# Propriedades
		private $dir;
		private $title;
		private $description;
		private $keywords;

		public function getDir() { return $this->dir; }
		public function setDir($dir) { $this->dir = $dir; }
		public function getTitle() { return $this->title; }
		public function setTitle($title) { $this->title = $title; }
		public function getDescription() { return $this->description; }
		public function setDescription($description) { $this->description = $description; }
		public function getKeywords() { return $this->keywords; }
		public function setKeywords($keywords) { $this->keywords = $keywords; }

		# Método responsável por renderizar o layout
		public function renderLayout() {
			include_once(DIRREQ.'app/view/Layout.php');
		}

		# Adiciona características específicas no header
		public function addHeader() {
			if (file_exists(DIRREQ."app/view/{$this -> getDir()}/main.php")) {
				include(DIRREQ."app/view/{$this -> getDir()}/main.php");
			}
		}

		# Adiciona características específicas no main
		public function addMain() {

		}

		# Adiciona características específicas no footer
		public function addFooter() {

		}
	}