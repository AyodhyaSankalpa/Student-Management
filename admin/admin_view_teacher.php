<?php

include '../config/config.php';


$sql = "SELECT * from teacher";
$result = mysqli_query($data, $sql);



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
		
		<h3>Teacher Data</h3>

		 <?php

            if($_SESSION['message'])
            {
                echo $_SESSION['message'];
            }

            unset($_SESSION['message']);

        ?>

		<center>
		<table border="1px">
            
                <tr>
                    <th>Teacher Name</th>
                    <th>About Teacher</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            
            

                <?php while ($info = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $info['name']; ?></td>
                        <td><?php echo $info['description']; ?></td>
                        <td><img style="width: 200px; height: 100px" src="<?php echo $info['image']; ?>"></td>
                       	<td>
                            <a style="padding: 5px;" class="btn btn-success" href="update_teacher.php?teacher_id=<?php echo $info['id']; ?>">Update</a>

                            <a onClick="javascript:return confirm('Are you sure to delete this?')" style="padding: 5px;" class="btn btn-danger" href="delete_teacher.php?teacher_id=<?php echo $info['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            
        </table>

		</center>

	</div>

</body>
</html>