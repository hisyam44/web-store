<?php
	session_start();
	spl_autoload_register(function ($class){
		include "php/".$class.".php";
	});
	$database = new Database();
	$view = new View();
?>