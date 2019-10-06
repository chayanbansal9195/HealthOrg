<?php
session_start();
include "dbConfig.php";
extract($_POST);

$sql = mysqli_query($con, "select patient_id from support_groups");
$data = mysqli_fetch_assoc($sql);
if ($data['patient_id'] == $patient_id) {
    echo "<script>alert('Already Exist.');window.location='../adminview.php';</script>";
    die();
} else {

    $sql1 = mysqli_query($con, "insert into support_groups(patient_id,medicine_bill,food_bill) VALUES('$patient_id','$medicine_bill','$food_bill')");

    $total = $food_bill + $medicine_bill;

    $sql2 = mysqli_query($con, "update appointments set bill_payment='$total' where patient_id='$patient_id'");
    $_SESSION['success'] = "Successfully Updated Bill Amount";
    header('location:../adminview.php');
}
