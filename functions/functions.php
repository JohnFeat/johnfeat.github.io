<?php
	$mysqli = false;
	function connectDB () {
		global $mysqli;
		$mysqli = new mysqli("localhost", "root", "", "data");
	}
	function access($getAccess)
		{
		    switch ($getAccess) {
		        case 1:
		            return '<span style="color: RED; ">Администратор</span>';
		        default:
		            return '<span style="color: GREEN; ">Пользователь</span>';
		    }
		}
?>

