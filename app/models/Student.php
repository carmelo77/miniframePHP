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

		public function store($data)
		{
			$sql = 'INSERT INTO students (name, age, id_section) VALUES (:name, :age, :id_section )';

			$this->db->query($sql);

			$this->db->bind(':name', $data['name']);
			$this->db->bind(':age', $data['age']);
			$this->db->bind(':id_section', $data['id_section']);

			if($this->db->execute()) {
				return true;
			} else {
				return false;
			}
		}

		public function edit($id)
		{
			$sql = 'SELECT * FROM students WHERE id = :id';
			$this->db->query($sql);

			$this->db->bind(':id', $id);
			$row = $this->db->getOne();

			return $row;
		}

		public function update($id, $data)
		{
			$sql = 'UPDATE students SET name = :name, age = :age, id_section = :id_section WHERE id = :id';
			$this->db->query($sql);

			$this->db->bind(':name', $data['name']);
			$this->db->bind(':age', $data['age']);
			$this->db->bind(':id_section', $data['id_section']);
			$this->db->bind(':id', $id);

			if($this->db->execute()) {
				return true;
			} else {
				return false;
			}
		}

		public function destroy($id)
		{
			$sql = 'DELETE FROM students WHERE id = :id';
			$this->db->query($sql);

			$this->db->bind(':id', $id);

			if($this->db->execute()) {
				return true;
			} else {
				return false;
			}

		}
	}

?>