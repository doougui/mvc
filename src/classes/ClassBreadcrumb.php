<?php 
	namespace Src\Classes;

	class ClassBreadcrumb {
		use \Src\Traits\TraitUrlParser;

		// Create breadbrumbs
		public function addBreadcrumb() {
			$contador = count($this -> parseUrl());
			$arrayLink[0] = '';

			echo "<a href='".DIRPAGE."'>Home</a> > ";

			for ($i = 0; $i < $contador; $i++) { 
				$arrayLink[0] .= $this -> parseUrl()[$i].'/';
				echo "<a href='".DIRPAGE.$arrayLink[0]."'>".$this -> parseUrl()[$i]."</a>";

				if ($i < $contador - 1) {
					echo " > ";
				}
			}
		}

		/*
		link: https://www.joseanmatias.com.br/breadcrumb-automatico-com-uso-de-funcao
		outros:
		https://www.google.com/search?safe=strict&sxsrf=ACYBGNRc5WGs79fQece-9T3yzEsWgqD8LQ%3A1569178996534&ei=dMWHXbysII605OUPsJOkuAw&q=breadcrumb+php&oq=breadcrumb+php&gs_l=psy-ab.3...184105.184379..184596...0.0..0.0.0.......0....1..gws-wiz.x_qsef1WKmg&ved=0ahUKEwi8trWlj-XkAhUOGrkGHbAJCccQ4dUDCAs&uact=5
		https://forum.imasters.com.br/topic/404178-resolvido%C2%A0classe-para-breadcrumb/
		
		public function anotherBreadCrumb() {

			/**
			 * @Author Josean Matias (www.joseanmatias.com.br)
			 * função para criar breadcrumb da página
			 * pode ser passado os fragmentos da url
			 * ou os fragmentos serão criados pela própria função
			 * @param $url_pieces = url em forma de array
			 asterisco/
			function breadcrumb($url_pieces = array(), $divisor = '>') {
			 //verifica se foram passados parametros
			 if ($url_pieces) {
			 	$url_crumb = $url_pieces;
				$http = null;
			 } else {
			 	//senão não houver parametro
			 	//então criar a url automaticamente
				$http = 'http://'; 
			 	$request = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			 	$explode = explode('/', $request);
			 	foreach($explode as $explode) {
			 		$url_crumb[str_replace('.php', '', $explode)] = str_replace('.php', '', $explode);
			 	}
			 }
			 //quantidade de fragmentos da url
				$count = sizeof($url_crumb);
			 //inicia contador
				$i = 1;
				foreach($url_crumb as $link=>$inner) {
			 		//verifica se é o primeiro fragmento da url
					if($i == 1) {
						$href .= $http.$link;
					} else {
						$href .= '/'.$link;
					}
			 		//verifica se é o ultimo fragmento da url
					if($i == $count) {
			 			//mostrar fragmento sem link
						$crumb[] = '<span>'.($inner).'</span>';
					} else {
			 			//mostrar fragmento com link para a pagina
						$crumb[] = '<a href="'.$href.'" title="'.$inner.'">'.$inner.'</a> '.$divisor.' ';
					}
					$i++;
				}

			 //mostrar breadcrumb na tela
				echo '<div class="breadcrumb">';
				foreach($crumb as $crumb) {
					echo $crumb;
				}
				echo '</div>';
		}
		*/
	}