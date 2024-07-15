<?php

error_reporting(0);
session_start();

	if (!isset($_SESSION['username'])) 
	{
		header("location:login.php");
	}

	elseif($_SESSION['usertype']=='student')
	{
		header("location:login.php");
	}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

