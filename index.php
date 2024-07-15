<?php
error_reporting(0);
session_start();

if(isset($_SESSION['message']))
{
    $message=$_SESSION['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
    unset($_SESSION['message']);  // Clear the message after displaying
}

$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT * FROM teacher";
$sql2="SELECT * FROM courses";

$teachers_result=mysqli_query($data,$sql);
$courses_result=mysqli_query($data,$sql2);

if (!$teachers_result || !$courses_result) {
    die("Query failed: " . mysqli_error($data));
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

    <nav>
        <a href="#" class="logo">E-School</a>

        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a class="btn btn-success" href="login.php">Login</a></li>
        </ul>
    </nav>

    <div class="section1">
        <img class="main_img" src="images/studentmanagement.png">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="images/school.png">
            </div>
            <div class="col-md-8">
                <h1>Welcome to E-school</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur.</p>
            </div>
        </div>
    </div>

    <center>
        <h1>Our Teacher</h1>
    </center>

    <div class="container">
        <div class="row">
            <?php while($info = mysqli_fetch_assoc($teachers_result)) { ?>
            <div class="col-md-4">
                <img class="teacher" src="admin/<?php echo $info['image']; ?>">
                <h3><?php echo $info['name']; ?></h3>
                <h5><?php echo $info['description']; ?></h5>
            </div>
            <?php } ?>
        </div>
    </div>

    <center>
        <h1>Our Courses</h1>
    </center>

    <div class="container">
        <div class="row">
            <?php while($info = mysqli_fetch_assoc($courses_result)) { ?>
            <div class="col-md-4">
                <img class="teacher" src="admin/<?php echo $info['image']; ?>">
                <h3><?php echo $info['name']; ?></h3>
            </div>
            <?php } ?>
        </div>
    </div>

    <center>
        <h1 class="adm">Admission Form</h1>
    </center>

    <div align="center" class="admission_form">
        <form action="admin/data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="email" name="email">
            </div>
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_txt" name="message"></textarea>
            </div>
            <div>
                <input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply">
            </div>
        </form>
    </div>

    <footer>
        <h6 class="footer_text">All @coppyright reserved by Ayodhya Sankalpa</h6>
    </footer>

</body>
</html>
