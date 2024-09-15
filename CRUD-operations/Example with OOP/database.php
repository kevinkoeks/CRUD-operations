<?php

class Database {
    public $pdo;

    // Zorgt voor het verbinden met de database bij het aanmaken van een object
    public function __construct($db = "Eduarte_DB", $user = "root", $pwd = "", $host = "localhost") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Verbonden met database $db";
        } catch (PDOException $e) {
            echo "Verbinding mislukt: " . $e->getMessage();
        }
    }

    // C = Create
    // Zorgt dat een student in Eduarte_DB wordt toegevoegd
    public function insertCreate(string $name, int $age, string $email) {
        $sqlQuery = "INSERT INTO students (name, age, email) VALUES (:name, :age, :email)"; //SQL
        $inProcess = $this->pdo->prepare($sqlQuery);
        $inProcess->bindParam(':name', $name);
        $inProcess->bindParam(':age', $age);
        $inProcess->bindParam(':email', $email);
        $inProcess->execute();
        echo "<br> Invoegen voor: $name was succesvol!";
    }

    // R = Read
    // Zorgt dat alle studenten uit de Eduarte_DB worden gelezen en uitgeprint
    public function readAll() {
        $sqlQuery = "SELECT * FROM students"; // SQL
        $inProcess = $this->pdo->query($sqlQuery);

        echo "<br>Gegevens uit de database:<br>";
        while ($row = $inProcess->fetch()) {
            echo "ID: $row[0] - Naam: $row[1] - Leeftijd: $row[2] - Email: $row[3] <br>";
        }
    }

    // U = Update
    // Zorgt dat de gegevens van een specifieke student worden bijgewerkt
    public function updateUser(int $id, string $name, int $age, string $email) {
        $sqlQuery = "UPDATE students SET name = :name, age = :age, email = :email WHERE id = :id"; // SQL
        $inProcess = $this->pdo->prepare($sqlQuery);
        $inProcess->bindParam(':name', $name);
        $inProcess->bindParam(':age', $age);
        $inProcess->bindParam(':email', $email);
        $inProcess->bindParam(':id', $id);
        $inProcess->execute();
        echo "<br> Bijwerken was succesvol voor ID: $id!";
    }

    // D = Delete
    // Zorgt dat een specifieke student uit de Eduarte_DB wordt verwijderd
    public function deleteUser(int $id) {
        $sqlQuery = "DELETE FROM students WHERE id = :id"; //SQL
        $inProcess = $this->pdo->prepare($sqlQuery);
        $inProcess->bindParam(':id', $id);
        $inProcess->execute();
        echo "<br> Verwijderen was succesvol voor ID: $id!";
    }
}

