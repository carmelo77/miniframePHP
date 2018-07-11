<?php 

namespace App\Libraries;

//Mapear la url ingresada en el navegador.

	class Core {
		protected $controller = 'Pages';
		protected $method = 'index';
		protected $params = [];

		public function __construct()
		{
			//print_r($this->getUrl());
			$url = $this->getUrl();

			//Buscar existencia del controlador en su carpeta.
			if (file_exists('../app/controllers/' . ucwords($url[0]) . 'Controller.php')) {
				# Si existe se coloca como controlador o ruta actual
				$this->controller = ucwords($url[0]);

				#unset Indice
				unset($url[0]);

			}

			//En dado caso que controlador escrito no exista, automaticamente acude al que está default, que es Pages.
			
			require_once '../app/controllers/' . $this->controller . 'Controller.php';

			$show = "\App\Controllers\\" . $this->controller . 'Controller';
			$this->controller = new $show;

			//Si se ha seteado un segundo param en la url, corresponde a la función.
			if(isset($url[1])) {
				//Ahora a revisar la segunda parte de la url para extraer el método.
				if(method_exists($show, $url[1])) {
					$this->method = $url[1];
					unset($url[1]);
				}
			}

			//Obtener lo parámetros
			$this->params = $url ? array_values($url) : [];

			//Callback con params array
			call_user_func_array([$this->controller, $this->method], $this->params);
		}

		public function getUrl()
		{
			//echo $_GET['url'];

			if(isset($_GET['url'])) {
				$url = rtrim($_GET['url'], '/'); //Quitar espacios que la url tenga hacia la derecha.
				$url = filter_var($url, FILTER_SANITIZE_URL); //Para que la $url sea interpretado como una url.
				$url = explode('/', $url);
				return $url;
			}
		}
	}


?>