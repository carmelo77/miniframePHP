<?php

namespace App\Models;

use App\Libraries\Database;

	class Student {

		private $db;

		public function __construct() {
			$this->db = new Database;
		}

		public function index()
		{
			$sql = 'SELECT t1.*, t2.name as name_section FROM students t1 INNER JOIN
				sections t2 ON t1.id_section = t2.id'; //Seleccionamos de tabla 1 (t1) Todo (*) y de tabla 2 (t2) el campo name, el cual le agregamos un alías 'name_section'. De la tabla students que es la tabla 1 (t1), con Inner Join en tabla sections que es tabla 2 (t2). Donde (En este caso es ON y no WHERE) el id_section de la tabla 1 sea igual al id de la tabla 2.

			$this->db->query($sql);

			return $this->db->getAll();
		}
	}

?>