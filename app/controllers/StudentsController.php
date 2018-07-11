<?php

namespace App\Controllers;

use App\Libraries\Controller;
use App\Helpers\Redirect;

	class StudentsController extends Controller {

		public function __construct() {
			$this->student = $this->model('Student');
			$this->section = $this->model('Section');

			$this->helper = new Redirect;
		}

		public function index()
		{
			$data['students'] = $this->student->index();

			$this->view('/students/index', $data);
		}

		public function create()
		{
			$data['section'] = $this->section->index(); 

			$this->view('/students/create', $data);
		}

		public function store()
		{
			if($_SERVER['REQUEST_METHOD'] == "POST") { 

				$data = [
					'name'	=>	trim($_POST['name']),
					'age'	=>	trim($_POST['age']),
					'id_section'	=>	trim($_POST['section']) 
				];

				if($this->student->store($data)) {
					$this->helper->redirect('/students');

				} else {
					die('Lo siento! Algo ha salido mal.');
				}

			} else {

				$data = [
					'name'	=>	'',
					'age'	=>	'',
					'id_section'	=>	'',
				];

				$this->view('/students/create', $data);
			}
		}

		public function edit($id)
		{

			$student = $this->student->edit($id);

			$data = [
				'id'	=>	$student->id,
				'name'	=>	$student->name,
				'age'	=>	$student->age,
				'id_section' => $student->id_section,
				'section'	=> $this->section->index()
			];

			$this->view('/students/edit', $data);
		}

		public function update($id)
		{
			if($_SERVER['REQUEST_METHOD'] == "POST") { 

				$data = [
					'name'	=>	trim($_POST['name']),
					'age'	=>	trim($_POST['age']),
					'id_section'	=>	trim($_POST['section']) 
				];

				if($this->student->update($id, $data)) {
					$this->helper->redirect('/students');

				} else {
					die('Lo siento! Algo ha salido mal.');
				}

			}
		}

		public function destroy($id)
		{
			if($_SERVER['REQUEST_METHOD'] == "POST") { 

				if($this->student->destroy($id)) {
					$this->helper->redirect('/students');

				} else {
					die('Lo siento! Algo ha salido mal.');
				}

			}
		}
	}

?>