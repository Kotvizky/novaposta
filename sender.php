<?php

require_once 'src/Delivery/NovaPoshtaApi2.php';

echo '<pre>';

$np = new \LisDev\Delivery\NovaPoshtaApi2('55c0aa75c51e16a59e32dca538ed7919');

$senderInfo = $np->getCounterparties('Sender', 1,
    '', 'db5c897c-391c-11dd-90d9-001a92567626');

print_r($senderInfo);