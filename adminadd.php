<?php
session_start();
if ($_SESSION['admin']) { } else {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HealthOrg -- Admin -- Add</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
</head>

<body class="full-height-grow">
    <div class="container full-height-grow">
        <header class="main-header">
            <a href="adminhome.php" class="brand-logo">
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
                Add Patient<br> Details
            </h1>
            <form action="action/add.php"method="POST" class="admin-form-add">
                <div class="input-group-add">
                    <label for="">Patient name</label>
                    <input type="text" name="patient_name" required>
                </div>
                <div class="input-group-add">
                    <label for="">DOB</label>
                    <input type="date" name="DOB" required>
                </div>
                <div class="input-group-add">
                    <label for="">Email Id</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-group-add">
                    <label for="">Phone Number</label>
                    <input type="text" name="ph_no" required>
                </div>
                <div class="input-group-add">
                    <label for="">Weight</label>
                    <input type="text" name="weight" required>
                </div>
                <div class="input-group-add">
                    <label for="">Address</label>
                    <input type="text" name="address" required>
                </div>
                <div class="input-group-add">
                    <label for="">Medical Condition</label>
                    <input type="text" name="medical_condition" required>
                </div>
                <div class="input-group-add">
                    <label for="">Doctor Appointed</label>
                    <input type="text" name="doctor_appointed" required>
                </div>
                <div class="input-group-add">
                    <button type="submit" class="btn" style="background-color:#2f416d">Add</button>
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