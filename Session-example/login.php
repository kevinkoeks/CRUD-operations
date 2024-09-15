<?php
    session_start(); // Maakt een session voor de user

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Hardcoded inlog gegevens (Dit haal je normaliter uit je DB)
        $correct_username = 'Kevin';
        $correct_password = '12345';

        // Simple validatie
        if ($username === $correct_username && $password === $correct_password) {
            // Session variable aanmaken en waarde toevoegen
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            header('Location: dashboard.php'); //Stuur user naar dashboard pagina
        } else {
            echo 'Incorrect login. Try again:';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>