<?php

function paramByKey($keyPart) {
    $result = [];
    foreach ($_GET as $key=>$value) {
        if(strpos($key, $keyPart)  === 0) {
            $result[str_replace($keyPart,'',$key)] = $value;
        }
    }
    return $result;
}
$sender = paramByKey('sender-');

unset($sender['Sender']);

$receiver = paramByKey('receiver-');
$receiver['CityRecipient'] = $receiver['CityRef'];

$params = paramByKey('params-');

$ttnDate = strtotime($params['DateTime']);
$params['DateTime'] = date('d.m.Y',$ttnDate);

require ('../model.php');
$model = new Model();

//echo '<pre>';
//print_r($sender);
//print_r($receiver);
//print_r($params);
//print_r($_GET);

$receiver['CityRef'] = $receiver['CityRecipient'];


//  $ttn = $model->np->newInternetDocument($sender, $receiver, $params);

//print_r($ttn);
//
//die();
/*
 *
if ($ttn['success']  = 1){
    //print_r($ttn);
    //print_r($ttn['data'][0]);
    $model->saveTtn($ttn['data'] [0]);
    header("Location: http://". $_SERVER['HTTP_HOST'] ."/index.php?reestr");

}
*/

    $ttn = $model->np->newInternetDocument(
        array(
//            'LastName' => $sender['LastName'],
//            'FirstName' => $sender['FirstName'],
//            'MiddleName' => $sender['MiddleName'],

//            'Sender' => '64bc9212-62f6-11ea-8513-b88303659df5',
//            'ContactSender' => '64c245dc-62f6-11ea-8513-b88303659df5',
//            'SendersPhone' => '380502750555',
            'CitySender' => 'db5c897c-391c-11dd-90d9-001a92567626',
            'SenderAddress' => '709892d0-0ac8-11e5-8a92-005056887b8d',

//            'City' => 'Чернігів',
//            'Region' => 'Чернігівська',
//            'Warehouse' => 'Відділення №13 (до 30 кг): просп. Миру, 49 (ЦУМ Чернігів)',

        ),
        array(
            'FirstName' => 'Сидор',
            'MiddleName' => 'Сидорович',
            'LastName' => 'Сиродов',
            "RecipientName" => "Сиродов Сидор Сидорович",
            'Phone' => '0509998877',
            "NewAddress" => "1",
            "RecipientCityName"=> "київ",
            "RecipientArea"=> "",
            "RecipientAreaRegions"=> "",
            "RecipientAddressName"=> "Столичне шосе 20 37",
            "RecipientHouse"=> "",
            "RecipientFlat"=> "",
            "RecipientType"=> "PrivatePerson",
            "RecipientsPhone"=> "380991234567",            
        ),
        array(
            'DateTime' => date('d.m.Y', time() + 4 * 84600),
            'ServiceType' => 'WarehouseDoors',
            'PaymentMethod' => 'Cash',
            'PayerType' => 'Recipient',
            'Cost' => '400',
            'SeatsAmount' => '1',
            'Description' => 'Спутник',
            'CargoType' => 'Cargo',
            'Weight' => '10',
            'VolumeGeneral' => '0.5',
        )
    );


//echo '<pre>' . print_r($ttn,1);

if ($ttn['success']  = 1){
    //print_r($ttn);
    //print_r($ttn['data'][0]);
    $model->saveTtn($ttn['data'] [0]);

    //echo 'Save TTN';
    header("Location: http://". $_SERVER['HTTP_HOST'] ."/index.php?reestr");

}
