<?php

//echo json_encode($_REQUEST); die();

if (!($_REQUEST['ref']))
    return;

function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=np", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

$pdo = connect();
$sth = $pdo->prepare(
    "SELECT ref, description 
            FROM cities WHERE city_area = ?
            ORDER BY description");
$sth->execute([$_REQUEST['ref']]);

$result = $sth->fetchAll();

echo json_encode($result);

