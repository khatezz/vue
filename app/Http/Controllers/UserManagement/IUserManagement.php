<?php  
	namespace App\Controllers\UserManagement;

	interface IUserManagement{
		public function store();
		public function update();
		public function delete();
		public function get();
		public function assignValue();
	}

?>