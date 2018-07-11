<?php

namespace App\Controllers;

use App\Libraries\Controller;

	class StudentsController extends Controller {

		public function __construct() {
			$this->student = $this->model('Student');
		}

		public function index()
		{
			$data['students'] = $this->student->index();

			$this->view('/students/index', $data);
		}

		public function create()
		{
			$this->view('/students/create');
		}
	}

?>