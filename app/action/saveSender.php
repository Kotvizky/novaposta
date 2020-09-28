<?php

updateSetting($_GET);
header("Location: http://". $_SERVER['HTTP_HOST'] ."/index.php?sender");
print_r($_GET);


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

function updateSetting($data){

    $pdo = connect();

    $sql = "update setting set api_key = ?, warehouse_ref = ? , city_ref = ?, sender_phone = ?";
    $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $data['np-key'],
            $data['np-warehouse'],
            $data['np-city'],
            $data['sender_phone'],
        ]);

}