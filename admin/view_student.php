<?php

include '../config/config.php';

$sql = "SELECT * from user WHERE usertype='student'";
$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <?php include 'admin_css.php'; ?>

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

    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <h3>Student Data</h3>

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
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            
           

                <?php while ($info = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $info['username']; ?></td>
                        <td><?php echo $info['email']; ?></td>
                        <td><?php echo $info['phone']; ?></td>
                        <td><?php echo $info['password']; ?></td>
                        <td>
                            <a style="padding: 5px;" class="btn btn-success" href="update_student.php?student_id=<?php echo $info['id']; ?>">Update</a>
                            <a onClick="javascript:return confirm('Are you sure to delete this?')" style="padding: 5px;" class="btn btn-danger" href="delete.php?student_id=<?php echo $info['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>

           
        </table>
        </center>
    </div>

</body>
</html>
