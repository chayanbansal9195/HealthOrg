<?php
session_start();
include "action/dbConfig.php";
if ($_SESSION['admin']) { } else {
    header('location:index.php');
}
$sql = mysqli_query($con, "select * from appointments");
?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HealthOrg -- Admin -- View</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
</head>

<body class="full-height-grow">
    <?php
    if (isset($_SESSION['success'])) {
        echo "<script type='text/javascript'>alert('$_SESSION[success]')</script>";
        unset($_SESSION['success']);
    }
    ?>
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

        <h1 class="admin-text admin-section" style="">
            View Patient Details
        </h1>
        <section class="admin-section">

            <?php while ($data = mysqli_fetch_assoc($sql)) { ?>
                <div class="admin-form-add">
                    <div class="input-group-add">
                        <label for="">Patient name</label>
                        <input type="text" value="<?php echo $data['patient_name'] ?>" readonly>
                    </div>
                    <div class="input-group-add">
                        <label for="">Medical Condition</label>
                        <input type="text" value="<?php echo $data['medical_condition'] ?>" readonly>
                    </div>
                    <div class="input-group-add">
                        <label for="">Bill Amount</label>
                        <input type="text" value="<?php echo $data['bill_payment'] ?>" readonly>
                    </div>
                    <div class="input-group-add">
                        <button type="submit" class="btn" style="background-color:#fb9224; margin-top:1.5rem"><a href="adminviewedit.php?id=<?php echo $data['patient_id'] ?>"> Add</a></button>
                    </div>
                    <div class="input-group-add">
                        <button type="submit" class="btn" style="background-color:#fb5225; margin-top:-0.2rem;"><a href="adminviewupdate.php?id=<?php echo $data['patient_id'] ?>"> Update</a></button>
                    </div>
                </div>

            <?php } ?>
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