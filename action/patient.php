<?php
 session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") {
    echo "<script>alert('Already Login.');window.location='../patienthome.php';</script>";
    die();
}

include "dbConfig.php";
extract($_POST);
if($login_id=='admin' and $password='admin'){
    header('location:../patient.php');
}
else{
$sql = mysqli_query($con, "select * from user where login_id='$login_id' and password='$password'");
$row = mysqli_num_rows($sql);
if ($row < 1) {
    header('location:../patient.php');
} else {
    $data = mysqli_fetch_assoc($sql);
    echo $_SESSION['admin'] = $data['login_id'];
    header('location:../patienthome.php');
}
}
