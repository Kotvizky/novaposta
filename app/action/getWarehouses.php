<?php

if (!($_REQUEST['ref']))
    return;

require_once '../../src/Delivery/NovaPoshtaApi2.php';

$np = new \LisDev\Delivery\NovaPoshtaApi2('55c0aa75c51e16a59e32dca538ed7919');
$result = $np->getWarehouses($_REQUEST['ref']);

foreach ($result['data'] as $item) {
    $data[] = [ 'ref' => $item['Ref'], 'description' => $item['Description'] ];
}

echo json_encode($data);