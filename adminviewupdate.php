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
    <title>HealthOrg -- Admin -- View -- Bill</title>
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
                Update Patient<br> Bill
            </h1>
            <form action="action/billupdate.php" method="POST" class="admin-form-add">
                <div class="input-group-add">
                    <label for="">Patient ID</label>
                    <input type="text" name="patient_id" value="<?php echo $_GET['id']   ?>">
                </div>
                <div class="input-group-add">
                    <label for="">Medicine Bill</label>
                    <input type="text" name="medicine_bill">
                </div>
                <div class="input-group-add">
                    <label for="">Food Bill</label>
                    <input type="text" name="food_bill">
                </div>
                <div class="input-group-add">
                    <button type="submit" class="btn" style="background-color:#2f416d">Update</button>
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