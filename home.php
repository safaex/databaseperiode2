
<?php

// Include het bestand waarin de Database class is gedefinieerd
include 'db.php';

// Maak een object van de Database class
$db = new Database();

// Nu kun je toegang krijgen tot de $pdo property van het $database object
$pdo = $db->pdo;

// Nu kun je queries uitvoeren met behulp van het $pdo object, bijvoorbeeld:
// $result = $pdo->query("SELECT * FROM jouw_tabel");

?>