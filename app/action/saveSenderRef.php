<?php


try {
    require ('../model.php');
    $model = new Model();
    $existingSender = $model->np->getCounterparties('Sender', 1, '', '');
    if (isset($existingSender['success']) && $existingSender['success'] == 1) {
        $ref = $existingSender['data'][0]['Ref'];
        $model->saveSenerRef($ref);
        $result = ['success' => 1 , 'ref' => $ref ];
        echo json_encode($result);
        die();
    }
} catch (Exception $e) {
    $result = ['success' => 0 , 'Ref' => $e->getMessage()] ;
    echo json_encode($result);
}


