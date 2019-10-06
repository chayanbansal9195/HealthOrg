<?php
include "action/dbConfig.php";
session_start();
if ($_SESSION['admin']) { } else {
    header('location:index.php');
}
$sql = mysqli_query($con, "select * from patient_feedback");
?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HealthOrg -- Admin -- FEED</title>
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
                Patient <br> Feedback
            </h1>
            <div class="admin-form-add">
                <?php while ($data = mysqli_fetch_assoc($sql)) { ?>
                    <div class="input-group-add feed">
                        <label for="">Patient id</label>
                        <input type="text" value="<?php echo $data['patient_id'] ?>" readonly>
                    </div>
                    <div class="input-group-add feed">
                        <label for="">Rating</label>
                        <?php $a = round((($data['hospital_ecosystem'] + $data['hospital_staff'] + $data['fees_value']) / 3),2); ?>
                        <input type="text" value="<?php echo $a ?>" readonly>
                    </div>
                <?php } ?>
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