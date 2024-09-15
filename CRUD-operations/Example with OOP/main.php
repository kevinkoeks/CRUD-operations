<?php

require_once "database.php";

$db = new Database();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $id = $_POST["id"];

    if (isset($_POST["create"])) {
        $db->insertCreate($name, $age, $email);
    } else if (isset($_POST["read"])) {
        $db->readAll();
    } else if (isset($_POST["update"])) {
        $db->updateUser($id, $name, $age, $email);
    } else if (isset($_POST["delete"])) {
        $db->deleteUser($id);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>CREATE: Add student:</h2>
    <form action="" method="post">
        Name: <input type="text" name="name" required>
        Age: <input type="text" name="age" required>
        Email: <input type="text" name="email" required>
        <input type="submit" name="create">
    </form>

    <h2>READ: Show all students:</h2>
    <form action="" method="post">
        <button name="read">Show Students</button>
    </form>

    <h2>UPDATE: Update student info:</h2>
    <form action="" method="post">
        ID: <input type="number" name="id" required>
        Name: <input type="text" name="name" >
        Age: <input type="text" name="age" >
        Email: <input type="text" name="email" required>
        <input type="submit" name="update">
    </form>

    <h2>DELETE: Remove student from the Database:</h2>
    <form action="" method="post">
        ID: <input type="number" name="id" required>
        <input type="submit" name="delete">
    </form>
</body>
</html>