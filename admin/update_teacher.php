<?php

include '../config/config.php';

	$id=$_GET['teacher_id'];

	$sql="SELECT * FROM teacher WHERE id='$id'";

	$result=mysqli_query($data,$sql);

	$info=$result->fetch_assoc();

	if (isset($_POST['update'])) 
	{
		$name=$_POST['name'];
		$about=$_POST['description'];
		$file=$_FILES['image']['name'];

		$dst="./images/teacher/".$file;

		$dst_db="images/teacher/".$file;

		move_uploaded_file($_FILES['image']['tmp_name'], $dst);

		if ($file) 
		{
			$query="UPDATE teacher SET name='$name',description='$about', image='$dst_db' WHERE id='$id' ";
		}

		else
		{
			$query="UPDATE teacher SET name='$name',description='$about' WHERE id='$id' ";
		}

		

		$result2=mysqli_query($data,$query);

	if($result2)
	{
		$_SESSION['message']='Updated Successfully';

		header("location:admin_view_teacher.php");
	}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>

	<?php

		include 'admin_css.php';

	?>

	<style type="text/css">
		
		label
		{
			display: inline-block;
			text-align: right;
			width: 100px;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.form_deg
		{
			background-color: skyblue;
			width: 600px;
			padding-top: 70px;
			padding-bottom: 60px;
			border-radius: 10px;
		}

	</style>

</head>
<body>

	<?php

		include 'admin_sidebar.php';

	?>

	

	<div class="content">
		
		<h3>Update Teacher Data</h3>

		<center>

			

				<form class="form_deg" action="#" method="POST" enctype="multipart/form-data">
					
					<div>
						<label>Name:</label>
						<input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
					</div>

					<div>
						<label>About:</label>
						<textarea name="description"><?php echo "{$info['description']}"; ?></textarea>
					</div>

					<div>
						<label>Old Image:</label>
						<img style="width: 200px; height: 100px;" src="<?php echo "{$info['image']}"; ?>">
					</div>

					<div>
						<label>New Image:</label>
						<input type="file" name="image">
					</div>

					<br>

					<div>
						<input style="margin-top: 10px;" class="btn btn-primary" id="submit" type="submit" value="Update" name="update">
					</div>

				</form>

			


		</center>
		

	</div>

</body>
</html>