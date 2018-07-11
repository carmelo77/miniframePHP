<?php

namespace App\Controllers;

use App\Libraries\Controller;
use App\Helpers\Redirect;

	class SectionsController extends Controller {

		private $helper;

		public function __construct() {
			$this->section = $this->model('Section');

			$this->helper = new Redirect;
		}

		public function index()
		{
			$data['sections'] = $this->section->index();

			$this->view('/sections/index', $data);
		}

		public function create()
		{
			$this->view('/sections/create');
		}

		public function store()
		{
			if($_SERVER['REQUEST_METHOD'] == "POST") { //Si el método que recibimos es de tipo post.
				$data = [
					'name'	=>	trim($_POST['name']) //Asignamos la variable enviada, y con trim quitamos los espacios vacios al principio y final de la cadena si es que esta la posee.
				];

				if($this->section->store($data)) {
					$this->helper->redirect('/sections');

				} else {
					die('Lo siento! Algo ha salido mal.');
				}

			} else {

				$data = [
					'name'	=>	''
				];

				$this->view('/sections/create', $data);
			}
		}

		public function edit($id)
		{
			$section = $this->section->edit($id);

			$data = [
				'id'	=> $id,
				'name'	=> $section->name
			];

			$this->view('/sections/edit', $data);
		}

		public function update($id)
		{
			if($_SERVER['REQUEST_METHOD'] == "POST") { //Si el método que recibimos es de tipo post.
				$data = [
					'name'	=>	trim($_POST['name']) //Asignamos la variable enviada, y con trim quitamos los espacios vacios al principio y final de la cadena si es que esta la posee.
				];

				if($this->section->update($id, $data)) {
					$this->helper->redirect('/sections');

				} else {
					die('Lo siento! Algo ha salido mal.');
				}

			} else {

				$data = [
					'name'	=>	''
				];

				$this->view('/sections', $data);
			}
		}

		public function destroy($id)
		{
			if($_SERVER['REQUEST_METHOD'] == "POST") { //Si el método que recibimos es de tipo post.

				if($this->section->destroy($id)) {
					$this->helper->redirect('/sections');

				} else {
					die('Lo siento! Algo ha salido mal.');
				}

			} else {

				$this->view('/sections');
			}
		}
	}

?>