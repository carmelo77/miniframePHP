<?php

namespace App\Models;

use App\Libraries\Database;

	class Section {

		private $db;

		public function __construct() {
			$this->db = new Database;
		}

		public function index()
		{
			$sql = "SELECT * FROM sections";

			$this->db->query($sql);
			return $this->db->getAll();
		}

		public function store($data)
		{
			$sql = 'INSERT INTO sections (name) VALUES (:name)'; //El :name se le dice sentences_prepares, y es lo que hacemos con el bind de PDO.
			$this->db->query($sql);

			//Vinculacion de valores
			$this->db->bind(':name', $data['name']);

			if($this->db->execute()) {
				return true;
			} else {
				return false;
			}
		}

		public function edit($id)
		{
			$sql = 'SELECT * FROM sections WHERE id = :id';
			$this->db->query($sql);

			$this->db->bind(':id', $id);
			$row = $this->db->getOne();

			return $row;
			
		}

		public function update($id, $data)
		{
			$sql = 'UPDATE sections SET name = :name WHERE id = :id';
			$this->db->query($sql);

			$this->db->bind(':name', $data['name']);
			$this->db->bind(':id', $id);

			if($this->db->execute()) {
				return true;
			} else {
				return false;
			}
		}

		public function destroy($id)
		{
			$sql = 'DELETE FROM sections WHERE id = :id';
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