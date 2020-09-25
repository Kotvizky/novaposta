<?php

require_once 'src/Delivery/NovaPoshtaApi2.php';

echo '<pre>';

$arias = include 'src/Delivery/NovaPoshtaApi2Areas.php';

$np = new \LisDev\Delivery\NovaPoshtaApi2('55c0aa75c51e16a59e32dca538ed7919');

## Генерирование новой электронной накладной

// Перед генерированием ЭН необходимо получить данные отправителя
// Получение всех отправителей
$senderInfo = $np->getCounterparties('Sender', 1,
    '+380502750555', '');

$price = $np->documentsTracking('20450281146218');

$result = $np->model('Counterparty')->save(array(
    'CounterpartyProperty' => 'Sender',
    'CityRef' => 'f4890a83-8344-11df-884b-000c290fbeaa',
    'CounterpartyType' => 'Organization',
    'FirstName' => 'ООО Рога и Копыта',
    'MiddleName' => '',
    'LastName' => '',
    'Phone' => '',
    'OwnershipForm' => '7f0f351d-2519-11df-be9a-000c291af1b3',
    'EDRPOU' => '12345678',
));

echo print_r($senderInfo); die();
// Выбор отправителя в конкретном городе (в данном случае - в первом попавшемся)
$sender = $senderInfo['data'][0];
// Информация о складе отправителя
$senderWarehouses = $np->getWarehouses($sender['City']);
// Генерирование новой накладной
$result = $np->newInternetDocument(
// Данные отправителя
    array(
        // Данные пользователя
        'FirstName' => $sender['FirstName'],
        'MiddleName' => $sender['MiddleName'],
        'LastName' => $sender['LastName'],
        // Вместо FirstName, MiddleName, LastName можно ввести зарегистрированные ФИО отправителя или название фирмы для юрлиц
        // (можно получить, вызвав метод getCounterparties('Sender', 1, '', ''))
        // 'Description' => $sender['Description'],
        // Необязательное поле, в случае отсутствия будет использоваться из данных контакта
        // 'Phone' => '0631112233',
        // Город отправления
        // 'City' => 'Белгород-Днестровский',
        // Область отправления
        // 'Region' => 'Одесская',
        'CitySender' => $sender['City'],
        // Отделение отправления по ID (в данном случае - в первом попавшемся)
        'SenderAddress' => $senderWarehouses['data'][0]['Ref'],
        // Отделение отправления по адресу
        // 'Warehouse' => $senderWarehouses['data'][0]['DescriptionRu'],
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
        'CargoType' => 'Cargo',
        // Вес груза
        'Weight' => '10',
        // Объем груза в куб.м.
        'VolumeGeneral' => '0.5',
        // Обратная доставка
        'BackwardDeliveryData' => array(
            array(
                // Кто оплачивает обратную доставку
                'PayerType' => 'Recipient',
                // Тип доставки
                'CargoType' => 'Money',
                // Значение обратной доставки
                'RedeliveryString' => 4552,
            )
        )
    )
);