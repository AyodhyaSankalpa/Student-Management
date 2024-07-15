<?php

session_start();

	if (!isset($_SESSION['username'])) 
	{
		header("location:login.php");
	}

	elseif($_SESSION['usertype']=='student')
	{
		header("location:login.php");
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

</head>
<body>

	<?php

		include 'admin_sidebar.php';

	?>

	

	<div class="content">
		
		<h1>Admin Dashboard</h1>

		

	</div>

</body>
</html>