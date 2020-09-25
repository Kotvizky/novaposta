<?php

require_once 'src/Delivery/NovaPoshtaApi2.php';

echo '<pre>';

$np = new \LisDev\Delivery\NovaPoshtaApi2('55c0aa75c51e16a59e32dca538ed7919');

$senderInfo = $np->getCounterparties('','', '');

//
//echo print_r($senderInfo);
//die();

$result = $np->newInternetDocument(
// Данные отправителя
    array(
        'Description' => 'Приватна особа',
        'Ref' => '82f28fae-3951-11e6-a54a-005056801333',
        'Phones' => '380502750555',
        'CitySender' => 'db5c897c-391c-11dd-90d9-001a92567626',
    ),
    // Данные получателя
    array(
        'FirstName' => 'Сидор',
        'MiddleName' => 'Сидорович',
        'LastName' => 'Сиродов',
        'Phone' => '0509998877',
        'City' => 'Киев',
        'Region' => 'Киевская',
        'Warehouse' => 'Отделение №3: ул. Калачевская, 13 (Старая Дарница)',
    ),
    array(
        // Дата отправления
        'DateTime' => date('d.m.Y'),
        // Тип доставки, дополнительно - getServiceTypes()
        'ServiceType' => 'WarehouseWarehouse',
        // Тип оплаты, дополнительно - getPaymentForms()
        'PaymentMethod' => 'Cash',
        // Кто оплачивает за доставку
        'PayerType' => 'Recipient',
        // Стоимость груза в грн
        'Cost' => '500',
        // Кол-во мест
        'SeatsAmount' => '1',
        // Описание груза
        'Description' => 'Кастрюля',
        // Тип доставки, дополнительно - getCargoTypes
        'CargoType' => 'Parcel',
        // Вес груза
        'Weight' => '10',
        // Объем груза в куб.м.
        'VolumeGeneral' => '0.5',
        // Обратная доставка
//        'BackwardDeliveryData' => array(
//            array(
//                // Кто оплачивает обратную доставку
//                'PayerType' => 'Recipient',
//                // Тип доставки
//                'CargoType' => 'Cargo',
//                // Значение обратной доставки
//                'RedeliveryString' => 4552,
//            )
//        )
    )
);

echo print_r($result);
