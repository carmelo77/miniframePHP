<?php

namespace App\Models;

use App\Libraries\Database;

	class Article {

		private $db;

		public function __construct() {
			$this->db = new Database;
		}

		public function index()
		{
			$sql = 'SELECT * FROM articles';
			$this->db->query($sql);
			return $this->db->getAll();
		}
	}

?>