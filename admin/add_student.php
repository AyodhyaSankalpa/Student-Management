<?php

include '../config/config.php';

$name = '';
$email = '';
$phone = '';

if (isset($_GET['admission_id'])) {
    $admission_id = $_GET['admission_id'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
}

if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = "student";

    $check = "SELECT * FROM user WHERE username='$username'";
    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);

    if ($row_count == 1) {
        echo "<script type='text/javascript'>
                alert('Username Already Exists. Try another one');
              </script>";
    } else {
        $sql = "INSERT INTO user(username,email,phone,usertype,password) VALUES ('$username','$user_email','$user_phone','$usertype','$user_password')";
        $result = mysqli_query($data, $sql);

        if ($result) {
            // Delete record from admission table
            if (isset($admission_id)) {
                $delete_sql = "DELETE FROM admission WHERE id='$admission_id'";
                mysqli_query($data, $delete_sql);
            }

            echo "<script type='text/javascript'>
                    alert('Data Uploaded Successfully');
                  </script>";

            // Redirect to clear form inputs
            header("Location: add_student.php");
            exit();
        } else {
            echo "Upload failed";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <?php include 'admin_css.php'; ?>

    <style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-top: 50px;
            padding-bottom: 50px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <h3>Add Student</h3>
        <center>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div class="">
                        <label class="">Username</label>
                        <input class="" type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
                    </div>
                    <div class="">
                        <label class="">Email</label>
                        <input class="" type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                    <div class="">
                        <label class="">Phone</label>
                        <input class="" type="number" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
                    </div>
                    <div class="">
                        <label class="">Password</label>
                        <input class="" type="text" name="password">
                    </div>
                    <div>
                        <input style="margin-top: 10px;" class="btn btn-primary" id="submit" type="submit" value="Add Student" name="add_student">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>
</html>
