<?php
include "dbConfig.php";
session_start();
extract($_POST);

$sql1 = mysqli_query($con, "select patient_id from patient_feedback where patient_id='$patient_id'");
$row = mysqli_num_rows($sql1);

if ($row < 1) {

    $sql = mysqli_query($con, "insert into patient_feedback (patient_id,hospital_ecosystem,hospital_staff,fees_value)values('$patient_id','$hospital_ecosystem','$hospital_staff','$fees_value')");
    $_SESSION['success'] = "Successfully Added Patient Feedback";
    header('location:../patienthome.php');
} else {
    $sql = mysqli_query($con, "update patient_feedback set hospital_ecosystem='$hospital_ecosystem',hospital_staff='$hospital_staff',fees_value='$fees_value' where patient_id='$patient_id'");
    $_SESSION['success'] = "Successfully Updated Patient Feedback";
    header('location:../patienthome.php');
}
