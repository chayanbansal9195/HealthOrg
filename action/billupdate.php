<?php
session_start();
include "dbConfig.php";
extract($_POST);
$sql = mysqli_query($con, "select patient_id from support_groups where patient_id='$patient_id'");
$data = mysqli_fetch_assoc($sql);
if ($data['patient_id'] != $patient_id) {
    $data['patient_id'];
    echo "<script>alert('Patient_Id was never billed.');window.location='../adminview.php';</script>";
    die();
} else {
    $sql4 = mysqli_query($con, "select * from support_groups where patient_id='$patient_id'");
    $data4 = mysqli_fetch_assoc($sql4);
    $m = $data4['medicine_bill'] + $medicine_bill;
    $f = $data4['food_bill'] + $food_bill;

    $sql1 = mysqli_query($con, "update support_groups set medicine_bill='$m',food_bill='$f' where patient_id='$patient_id'");

    $sql2 = mysqli_query($con, "select bill_payment from appointments where patient_id='$patient_id'");
    $data1 = mysqli_fetch_assoc($sql2);
    $total = $food_bill + $medicine_bill + $data1['bill_payment'];

    $sql3 = mysqli_query($con, "update appointments set bill_payment='$total' where patient_id='$patient_id'");
    $_SESSION['success'] = "Successfully Updated Bill Amount";
    header('location:../adminview.php');
}
