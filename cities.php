<?php

require_once 'src/Delivery/NovaPoshtaApi2.php';

$arias = include 'src/Delivery/NovaPoshtaApi2Areas.php';

$np = new \LisDev\Delivery\NovaPoshtaApi2('55c0aa75c51e16a59e32dca538ed7919');

// $result = $np->getCities();

// file_put_contents("areas.json",json_encode($result));

//$result = json_decode(file_get_contents('areas.json'),true);

//file_put_contents('citie.txt', print_r($result,1));

$result = $np->getWarehouses('db5c897c-391c-11dd-90d9-001a92567626');

file_put_contents("warehouses.json",json_encode($result));

$result = json_decode(file_get_contents('warehouses.json'),true);

file_put_contents('warehouses.txt', print_r($result,1));


echo '<pre>';

echo print_r($result);


//[Description] => Чернігів
//[DescriptionRu] => Чернигов
//[Ref] => db5c897c-391c-11dd-90d9-001a92567626