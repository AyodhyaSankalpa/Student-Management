<?php

include '../config/config.php';

	$sql="SELECT * from admission";

	$result=mysqli_query($data,$sql);

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
        
        th {
          background-color: skyblue;
          font-size: 20px;
          padding: 20px;
           
        }

        td {
          padding: 20px;
        }

    </style>

</head>
<body>

	<?php

		include 'admin_sidebar.php';

	?>

	<div class="content">
		
		<h3>Applied For Admission</h3>
		<br>

		 <?php

            if($_SESSION['message'])
            {
                echo $_SESSION['message'];
            }

            unset($_SESSION['message']);

        ?>

        <br>

		<center>

			<table border="1px">
  
			    <tr>
			      <th style="text-align: center;">Name</th>
			      <th style="text-align: center;">Email</th>
			      <th style="text-align: center;">Phone</th>
			      <th style="text-align: center;">Message</th>
			      <th style="text-align: center;">Action</th>
			    </tr>
			  
			  <tbody>

			  	<?php

			  	while ($info=$result->fetch_assoc()) 
			  	{
			  		
			  	

			  	?>

			    <tr>
			      <td style="padding: 5px;"><?php echo "{$info['name']}"; ?></td>
			      <td style="padding: 5px;"><?php echo "{$info['email']}"; ?></td>
			      <td style="padding: 5px;"><?php echo "{$info['phone']}"; ?></td>
			      <td style="padding: 5px;"><?php echo "{$info['message']}"; ?></td>
			      <td>
			      		<a style="padding: 5px;" class="btn btn-success" href="add_student.php?admission_id=<?php echo $info['id']; ?>&name=<?php echo urlencode($info['name']); ?>&email=<?php echo urlencode($info['email']); ?>&phone=<?php echo urlencode($info['phone']); ?>">Add</a>


                  <a onClick="javascript:return confirm('Are you sure to delete this?')" style="padding: 5px;" class="btn btn-danger" href="delete_admission.php?admission_id=<?php echo $info['id']; ?>">Delete</a>
			      </td>
			    </tr>

			    <?php

			    	}

			    ?>

			</table>

</center>

	</div>

</body>
</html>