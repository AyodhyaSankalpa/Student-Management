<?php

include '../config/config.php';

	if(isset($_POST['add_teacher']))
	{
		$t_name=$_POST['name'];
		$t_description=$_POST['description'];
		$file=$_FILES['image']['name'];

		$dst="./images/teacher/".$file;

		$dst_db="images/teacher/".$file;

		move_uploaded_file($_FILES['image']['tmp_name'],$dst);

		$sql="INSERT INTO teacher (name,description,image) VALUES ('$t_name','$t_description','$dst_db')";

		$result=mysqli_query($data,$sql);

		if ($result) 
		{
			header('location:admin_add_teacher.php');
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
		
		

		.div_deg
		{
			background-color: skyblue;
			width: 500px;
			padding-top: 50px;
			padding-bottom: 50px;
			border-radius: 10px;
		}

	</style>

</head>
<body>

	<?php

		include 'admin_sidebar.php';

	?>

	

	<div class="content">
		
		<h3>Add Teacher</h3>


		<br>

		<center>

			<div class="div_deg">
			
				<form  action="#" method="POST" enctype="multipart/form-data">
				
					<div class="">
						<label class="">Teacher Name :</label>
						<input class="" type="text" name="name">
					</div>

					<br>

					<div class="">
						<label class="">Description :</label>
						<textarea name="description"></textarea>
					</div>

					<br>

					<div class="">
						<label class="">Image :</label>
						<input class="" type="file" name="image">
					</div>

					<br>


					<div>
						
						<input style="margin-top: 10px;" class="btn btn-primary" id="submit" type="submit" value="Add Teacher" name="add_teacher">
					</div>

				</form>

		</div>

		</center>

		

	</div>

</body>
</html>