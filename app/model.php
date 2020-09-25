<?php


    class Model{

        public function __construct()
        {
            $this->pdo = $this->connect();
            $this->apiKey = $this->getApiKey();
            require_once  __DIR__ . '/../src/Delivery/NovaPoshtaApi2.php';
            $this->np = new \LisDev\Delivery\NovaPoshtaApi2($this->apiKey);
        }

        private $pdo;
        public $np;
        public $apiKey;

        function getSetting(){
            $sth = $this->pdo->prepare(
                "SELECT api_key, sender_ref, warehouse_ref, city_ref 
                    FROM setting LIMIT 1");
            $sth->execute();
            if ($sth->rowCount())
                return $sth->fetch();
            return [];
        }

        function getCityArea($city_ref) {
            $sth = $this->pdo->prepare(
                "SELECT city_area
            FROM cities WHERE ref = ?
            ORDER BY description");
            $sth->execute([$city_ref]);
            $row = $sth->fetch();
            return $row['city_area'];
        }

        function getAreas(){
            $sth = $this ->pdo->prepare("select DISTINCT area_description description, city_area ref from cities ORDER BY area_description");
            $sth->execute();
            return $sth->fetchAll();
        }


        function getCities($city_ref){
            $sth = $this->pdo->prepare(
                "SELECT ref, description 
            FROM cities WHERE city_area = ?
            ORDER BY description");
            $sth->execute([$city_ref]);
            return $sth->fetchAll();
        }

        function getWarehouses($city_ref){
            $result = $this->np->getWarehouses($city_ref);
            $data = [];
            foreach ($result['data'] as $item) {
                $data[] = [ 'ref' => $item['Ref'], 'description' => $item['Description'] ];
            }
            return $data;
        }

        private function connect(){
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

        function saveSenerRef($ref) {
            $sth = $this->pdo
                ->prepare("update setting set sender_ref = ?");
            $sth->execute([$ref]);
        }

        function getApiKey() {
            $sth = $this->pdo->prepare(
                "SELECT api_key FROM setting LIMIT 1");
            $sth->execute();
            $row = $sth->fetch();
            return $row['api_key'];
        }

    }