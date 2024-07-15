<?php

include '../config/config.php';

	if(isset($_POST['add_course']))
	{
		$c_name=$_POST['name'];
		$c_description=$_POST['description'];
		$file=$_FILES['image']['name'];

		$dst="./images/courses/".$file;

		$dst_db="images/courses/".$file;

		move_uploaded_file($_FILES['image']['tmp_name'],$dst);

		$sql="INSERT INTO courses (name,description,image) VALUES ('$c_name','$c_description','$dst_db')";

		$result=mysqli_query($data,$sql);

		if ($result) 
		{
			header('location:view_courses.php');
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
		
		<h3>Add Course</h3>


		<br>

		<center>

			<div class="div_deg">
			
				<form  action="#" method="POST" enctype="multipart/form-data">
				
					<div class="">
						<label class="">Course Name :</label>
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
						
						<input style="margin-top: 10px;" class="btn btn-primary" id="submit" type="submit" value="Add Course" name="add_course">
					</div>

				</form>

		</div>

		</center>

		

	</div>

</body>
</html>