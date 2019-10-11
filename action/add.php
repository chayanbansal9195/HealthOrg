<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
session_start();
include('dbConfig.php');
date_default_timezone_set("Asia/Kolkata");
$year = date("Y");
$month = date("m");
$day = date("d");
$date = date('Y-m-d');
$time = date('H:i:s');
extract($_POST);

$r = mysqli_query($con, "select MAX(id) as max from appointments");
$ma = mysqli_fetch_row($r);
$i = $ma[0];
$id = $i + 1;
$sql = mysqli_query($con, "select patient_id from appointments");
$appointment_no = 'AP' . $year . $month . $id;
$patient_id = 'PI' . $year . $month . $id;
$pass= rand(1,100000);
$data = mysqli_fetch_assoc($sql);
if ($data['patient_id'] == $patient_id) {
    "<script>alert('Patient Id Already Exist.');window.location='../adminadd.php';</script>";
    die();
} else {

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '';                     // SMTP username
        $mail->Password   = '';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('', 'HealthOrg');
        $mail->addAddress($email, $patient_name);
        
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Security Details';
        $mail->Body    = 'Login Id <b>'.$patient_id.'</b> and Login Password <b>'.$pass.'</b>';
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $sql2=mysqli_query($con,"insert into user (login_id,password) VALUES ('$patient_id','$pass')");

    $sql1 = mysqli_query($con, "INSERT INTO `appointments`(`patient_name`, `appointment_no`, `patient_id`,`date`,`time`, `dob`,`email`, `medical_condition`, `doctor_appointed`, `ph_no`, `weight`, `address`) VALUES ('$patient_name','$appointment_no','$patient_id','$date','$time','$DOB','$email','$medical_condition','$doctor_appointed','$ph_no','$weight','$address')");
    $_SESSION['success'] = "Successfully Added Patient Details";
    header('location:../adminhome.php');
}
