<?php 

	session_start();
	ob_start();


	if(isset($_SESSION['id']) && isset($_SESSION['role'])){

		$user_id 	= $_SESSION['id'];
		$user_role 	= $_SESSION['role'];
	}



	$db = new mysqli('localhost', 'root', '', 'housing_society_sql_final');



 ?>