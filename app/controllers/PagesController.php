<?php

namespace App\Controllers;
use App\Libraries\Controller;

	class PagesController extends Controller {

		public function __construct() {
			//print "Cargado PagesController";

			$this->article = $this->model('Article');
		}

		public function index()
		{
			$data['articles'] = $this->article->index();

			$data['titulo']	= 'Bienvenido a esta página.';

			$data['lang']	= 'PHP POO';

			$this->view('pages/index', $data);
		}

		public function store()
		{

		}

		public function show()
		{

		}

		public function edit()
		{

		}

		public function update()
		{

		}

		public function destroy()
		{

		}
	}

?>