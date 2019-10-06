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
    <title>HealthOrg -- Admin</title>
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
            <a href="index.php" class="brand-logo">
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
            <div class="input-group-button">
                <button class="btn" style="background-color:#2f416d"> <a href="adminadd.php"> Add</a> </button>
            </div>
            <div class="input-group-button">
                <button class="btn" style="background-color:#fb9224"> <a href="adminview.php"> View</a></button>
            </div>
            <div class="input-group-button">
                <button class="btn" style="background-color:#d9eeec"> <a href="adminfeed.php"> Feedback</a></button>
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