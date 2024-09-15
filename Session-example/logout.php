<?php
session_start(); // Start weer de session, zodat het alle data verzamelt van de user. 

session_destroy(); // Verwijdert alle verzamelt data van user. 

header('Location: login.php'); // Terug naar loginpage.
