<?php

include '../config/config.php';


if($_GET['course_id']) 
{
	$c_id=$_GET['course_id'];

	$sql="DELETE FROM courses WHERE id='$c_id' ";

	$result=mysqli_query($data,$sql);

	if($result)
	{
		$_SESSION['message']='Delete Course is Successfully';

		header("location:view_courses.php");
	}
}

?>