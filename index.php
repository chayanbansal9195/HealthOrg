<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] != "") {
    echo "<script>alert('Already Login.');window.location='adminhome.php';</script>";
    die();
}
?>

<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HealthOrg</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
</head>

<body class="full-height-grow">
    <div class="container full-height-grow">
        <header class="main-header">
            <a href="patient.php" class="brand-logo">
                <div class="brand-logo-name"><span class="accent">H</span> ealth <span class="accent">O</span> rg</div>
            </a>
            <nav class="main-nav">
                <ul>
                    <li>
                        <a href="patient.php">Patient</a>
                    </li>
                </ul>
            </nav>
        </header>
        <section class="admin-section">
            <h1 class="admin-text">
                Admin Login
            </h1>
            <form action="action/admin.php" method="POST" class="admin-form">
                <div class="input-group">
                    <label for="">Login Id</label>
                    <input type="text" name="login_id">
                </div>
                <div class="input-group">
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn">Login</button>
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