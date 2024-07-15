<?php

include '../config/config.php';


if($_GET['teacher_id']) 
{
	$t_id=$_GET['teacher_id'];

	$sql="DELETE FROM teacher WHERE id='$t_id' ";

	$result=mysqli_query($data,$sql);

	if($result)
	{
		$_SESSION['message']='Delete Teacher is Successfully';

		header("location:admin_view_teacher.php");
	}
}

?>