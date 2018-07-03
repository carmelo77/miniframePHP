<?php

namespace App\Controllers;

	class ArticlesController {

		public function __construct() {
			//print "Cargado ArticlesController";
		}

		public function index()
		{
			echo "Index page Articles";
		}

		public function create()
		{
			echo "Create a new Article";
		}

		public function edit($id)
		{
			echo $id;
		}
	}

?>