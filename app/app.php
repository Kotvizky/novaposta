<?php

//require '../libs/Smarty.class.php';

require './libs/Smarty.class.php';
require 'src/Delivery/NovaPoshtaApi2.php';
require 'model.php';


$smarty = new Smarty;
//$smarty->force_compile = true;
// $smarty->debugging = true;
$smarty->caching = false;
$smarty->cache_lifetime = 120;
$smarty->setTemplateDir( __DIR__ . '/tpl');
$smarty->setTemplateDir('./app/tpl');

$smarty->assign('navbar',[
    ['name' => 'регионы',       'param'=>'index.php?regions'],
    ['name' => 'склады',        'param'=>'index.php?warehouses'],
    ['name' => 'отправитель',   'param'=>'index.php?sender'],
    ['name' => 'печать',         'param'=>'index.php?print'],
    ['name' => 'заполнить города',         'param'=>'index.php?updateCities'],
]);

if ($_GET) {
    $functionName = key($_GET);
    if (function_exists($functionName)) {
        $functionName();
    }
}

$smarty->display('index.tpl');

function sender(){

    $model = new Model();

    $areas = [];
    $cities = [];
    $warehouses = [];
    $cityArea ='';
    $cityRef ='';
    $warehouseRef ='';

    $setting = $model->getSetting();
    if ($setting) {
        if (isset($setting['city_ref'])) $cityRef = $setting['city_ref'];
        if (isset($setting['warehouse_ref'])) $warehouseRef = $setting['warehouse_ref'];
        if ($setting['city_ref']!= '') {
            $areas = $model->getAreas();
            $cityArea = $model->getCityArea($cityRef);
            $cities = $model->getCities($cityArea);
            $warehouses = $model->getWarehouses($cityRef);
        }
    }

    printContent([
        'apiKey' => $setting['api_key'],
        'areas' => $areas,
        'cityArea' => $cityArea,
        'cityRef' => $cityRef,
        'warehouseRef' => $warehouseRef,
        'cities' => $cities,
        'warehouses' => $warehouses,
    ],'senderForm.tpl');

}

function updateCities(){
    //$np = new \LisDev\Delivery\NovaPoshtaApi2('55c0aa75c51e16a59e32dca538ed7919');
    $cities = json_decode(file_get_contents('areas.json'),true);
    $cities = $cities['data'];

    $pdo = connect();
    $pdo->exec('TRUNCATE TABLE cities');

    $sql = "INSERT INTO cities (city_id, description, ref, city_area, area_description, json_description) 
            VALUES (?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);

    $count = 0;

    foreach ($cities as $item) {
        $stmt->execute([
            $item['CityID'],
            $item['Description'],
            $item['Ref'],
            $item['Area'],
            $item['AreaDescription'],
            json_encode($item['Description']),
        ]);
        $count++;
    }
    echo '<pre>';
    echo "Добавил $count городов.";
    die();

}

function regions() {

    $pdo = connect();
    $sth = $pdo->prepare("select DISTINCT area_description, city_area from cities ORDER BY area_description");
    $sth->execute();
    $result = $sth->fetchAll();

    printContent(['content' => $result],'regions.tpl');
}

function warehouses() {

    $pdo = connect();
    $sth = $pdo->prepare("select DISTINCT area_description, city_area from cities ORDER BY area_description");
    $sth->execute();
    $result = $sth->fetchAll();
    printContent(['areas'=>$result],'warehouses.tpl');

}

function printContent($content, $template) {

    global $smarty;
    foreach ($content as $key=>$value) {
        $smarty->assign($key,$value);
        //print_r($value); die();
    }
    $output = $smarty->fetch($template);
    $smarty->assign('index_content',$output);
}

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