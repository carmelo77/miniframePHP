<?php

namespace App\Libraries;
	
	//Clase para conectarse a la base de datos y ejecutar consultas. PDO.

	class Database {

		private $host = DB_HOST;
		private $user = DB_ROOT;
		private $psw = DB_PSW;
		private $db = DB_NAME;

		private $dbh; //Database Handler. (Normalmente se usa en PDO).
		private $stmt; //Statement, es el ejecutar una consulta en PDO.
		private $error;

		public function __construct() {

			//Configurar Conexion
			$connect = 'mysql:host=' . $this->host . ';dbname=' . $this->db;

			$options = array(
				\PDO::ATTR_PERSISTENT	=>	true, #La conexión que usa con PDO, va a ser persistente.
				\PDO::ATTR_ERRMODE		=>	\PDO::ERRMODE_EXCEPTION, #
			);

			//Crear instancia de PDO
			try {

				$this->dbh = new \PDO($connect, $this->user, $this->psw, $options);
				$this->dbh->exec('set names utf8'); //Evitar problemas con caracteres especiales.

			} catch(PDOException $e) {

				$this->error = $e->getMessage(); //Manejador de error avanzado en PDO.
				echo $this->error;
			}
		}

		//Preparamos la consulta
		public function query($sql)
		{
			$this->stmt = $this->dbh->prepare($sql);
		}

		// Vinculamos la consulta con bind.
		public function bind($param, $value, $type = null)
		{
			if (is_null($type)) {
				switch (true) {

					case is_int($value):
						$type = \PDO::PARAM_INT;
					break;

					case is_bool($value):
						$type = \PDO::PARAM_BOOL;
					break;
					
					case is_null($value):
						$type = \PDO::PARAM_NULL;
					break;


					default:
						$type = \PDO::PARAM_STR;
					break;
				}
			}

			$this->stmt->bindValue($param, $value, $type);
		}

		//Ejecuta la consulta
		public function execute()
		{
			return $this->stmt->execute();
		}

		//Obtener todos los datos
		public function getAll()
		{
			$this->execute();
			return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
		}

		//Obtener un solo dato especifico.
		public function getOne()
		{
			$this->execute();
			return $this->stmt->fetch(\PDO::FETCH_OBJ);
		}

		// Obtener la cantidad de filas existentes.
		public function count()
		{
			return $this->stmt->rowCount();
		}
	}

?>