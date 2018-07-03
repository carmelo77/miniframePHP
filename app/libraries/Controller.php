<?php

namespace App\Libraries;

	# Seccion para cargar los modelos y vistas.
	
	class Controller {

		public function Model($model)
		{
			require_once '../app/models/' . $model . '.php';

			$show = "\App\Models\\" . $model;
			return new $show();
		}

		public function View($view, $data = [])
		{
			//Verificar si archivo existe
			if(file_exists('../app/views/' . $view . '.php')) {

				require_once '../app/views/' . $view . '.php';
			} else {

				die('The view not exist.');
			}

		}
	}


?>