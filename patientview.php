<?php
include "action/dbConfig.php";
session_start();
if ($_SESSION['admin']) { } else {
    header('location:patient.php');
}
$sql = mysqli_query($con, "select * from appointments where patient_id='$_SESSION[admin]'");
$data = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HealthOrg -- Patient -- View</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
</head>

<body class="full-height-grow">
    <div class="container full-height-grow">
        <header class="main-header">
            <a href="patienthome.php" class="brand-logo">
                <div class="brand-logo-name"><span class="accent">H</span> ealth <span class="accent">O</span> rg</div>
            </a>
            <nav class="main-nav">
                <ul>
                    <li>
                        <a href="#"><?php echo $_SESSION['admin'] ?></a>
                    </li>
                    <li>
                        <a href="action/logout.php">Logout</a>
                    </li>
                </ul>
            </nav>
        </header>
        <section class="admin-section">
            <h1 class="admin-text">
                View Patient<br> Details
            </h1>
            <div class="admin-form-add">
                <div class="input-group-add">
                    <label for="">Appointment Number</label>
                    <input type="text" value="<?php echo $data['appointment_no'] ?>" readonly>
                </div>
                <div class="input-group-add">
                    <label for="">Patient Id</label>
                    <input type="text" value="<?php echo $data['patient_id'] ?>" readonly>
                </div>
                <div class="input-group-add">
                    <label for="">Date Registered</label>
                    <input type="text" value="<?php echo $data['date'] ?>" readonly>
                </div>
                <div class="input-group-add">
                    <label for="">Patient name</label>
                    <input type="text" value="<?php echo $data['patient_name'] ?>" readonly>
                </div>

                <div class="input-group-add">
                    <label for="">Phone Number</label>
                    <input type="text" value="<?php echo $data['ph_no'] ?>" readonly>
                </div>
                <div class="input-group-add">
                    <label for="">Medical Condition</label>
                    <input type="text" value="<?php echo $data['medical_condition'] ?>" readonly>
                </div>
                <div class="input-group-add">
                    <label for="">Weight</label>
                    <input type="text" value="<?php echo $data['weight'] ?>" readonly>
                </div>
                <div class="input-group-add">
                    <label for="">Address</label>
                    <input type="text" value="<?php echo $data['address'] ?>" readonly>
                </div>

                <div class="input-group-add">
                    <label for="">Doctor Appointed</label>
                    <input type="text" value="<?php echo $data['doctor_appointed'] ?>" readonly>
                </div>
                <div class="input-group-add">
                    <label for="">DOB</label>
                    <input type="text" value="<?php echo $data['dob'] ?>" readonly>
                </div>
                <div class="input-group-add">
                    <label for="">Bill Amount</label>
                    <input type="text" value="<?php echo $data['bill_payment'] ?>" readonly>
                </div>
            </div>

        </section>
    </div>

    <footer class="main-footer">
        <div class="container">
            <nav class="footer-nav">
                <ul>
                    <li>
                        <span>&copy; </span><span>Cbsal Corp.</span>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>

</body>

</html>