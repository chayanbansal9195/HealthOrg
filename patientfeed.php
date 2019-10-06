<?php
include "action/dbConfig.php";
session_start();
if ($_SESSION['admin']) { } else {
    header('location:patient.php');
}
$sql = mysqli_query($con, "select * from patient_feedback where patient_id='$_SESSION[admin]'");
$data = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HealthOrg -- Patient -- Feed</title>
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
                Add Patient<br> Feedback
            </h1>
            <form action="action/patientfeed.php" method="POST" class="admin-form-add">
                <div class="input-group-add">
                    <label for="">Hospital Ecosystem</label>
                    <select name="hospital_ecosystem" id="">
                        <option value="<?php echo $data['hospital_ecosystem'] ?>"><?php echo $data['hospital_ecosystem'] ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <input type="hidden" name="patient_id" value="<?php echo $_SESSION['admin'] ?>">
                <div class="input-group-add">
                    <label for="">Hospital Staff</label>
                    <select name="hospital_staff" id="">
                    <option value="<?php echo $data['hospital_staff'] ?>"><?php echo $data['hospital_staff'] ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="input-group-add">
                    <label for="">Fees Value</label>
                    <select name="fees_value" id="">
                    <option value="<?php echo $data['fees_value'] ?>"><?php echo $data['fees_value'] ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="input-group-add">
                    <button type="submit" class="btn" style="background-color:#d9eeec">Add</button>
                </div>
            </form>

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