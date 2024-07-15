<?php

include '../config/config.php';


if($_GET['admission_id']) 
{
	$a_id=$_GET['admission_id'];

	$sql="DELETE FROM admission WHERE id='$a_id' ";

	$result=mysqli_query($data,$sql);

	if($result)
	{
		$_SESSION['message']='Delete Admission is Successfully';

		header("location:admission.php");
	}
}

?>