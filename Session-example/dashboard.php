<?php
session_start(); // Start weer de session, zodat alle data van user beschikbaar komt. 

// Check of user al  ingelogged is
if ($_SESSION["loggedin"] == false) {
    // Als user niet is ingelogged door sturen naar loginpage
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to your dashboard, <?php echo $_SESSION['username']; ?>!</h2>
    <p>You are logged in now.</p>
    <a href="logout.php">Logout</a>
</body>
</html>