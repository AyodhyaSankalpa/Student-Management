<?php

include '../config/config.php';

	$id=$_GET['student_id'];

	$sql="SELECT * from user WHERE id='$id'";

	$result=mysqli_query($data,$sql);

	$info=$result->fetch_assoc();

	if (isset($_POST['update'])) 
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];

		$query="UPDATE user SET username='$name',email='$email',phone='$phone',password='$password' WHERE id='$id' ";

		$result2=mysqli_query($data,$query);

	if($result2)
	{
		$_SESSION['message']='Updated Successfully';

		header("location:view_student.php");
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

		.div_deg
		{
			background-color: skyblue;
			width: 400px;
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
		
		<h3>Update Student Data</h3>

		
		<center>

			<div class="div_deg">
			
				<form  action="#" method="POST">
				
					<div class="">
						<label class="">Username</label>
						<input class="" type="text" name="name" value="<?php echo "{$info['username']}"; ?>">
					</div>

					<div class="">
						<label class="">Email</label>
						<input class="" type="email" name="email" value="<?php echo "{$info['email']}"; ?>">
					</div>

					<div class="">
						<label class="">Phone</label>
						<input class="" type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>">
					</div>

					<div class="">
						<label class="">Password</label>
						<input class="" type="text" name="password" value="<?php echo "{$info['password']}"; ?>">
					</div>

					<div>
						
						<input style="margin-top: 10px;" class="btn btn-primary" id="submit" type="submit" value="Update" name="update">
					</div>

				</form>

		</div>

		</center>
			
		

	</div>

</body>
</html>