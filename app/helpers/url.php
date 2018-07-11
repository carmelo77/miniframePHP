<?php

namespace App\Helpers;

	class Redirect {

		public function redirect($page)
		{
			header('location: ' . ROOT_URL . $page);
		}
	}


?>