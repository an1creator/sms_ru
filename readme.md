###### forked from https://github.com/zelenin/sms_ru

# sms_ru

PHP-класс для работы с api сервиса [sms.ru](http://sms.ru)

## Установка

### Предупреждение

Версия 4 имеет отличное от предыдущих версий API.

### Установка через Composer

Запустите

```
php composer.phar require n1creator/smsru "dev-master"
```

или добавьте

```
"n1creator/smsru": "dev-master"
```

в секцию ```require``` вашего composer.json

## Использование

Простая авторизация (с помощью api_id):

```php
$client = new \N1Creator\SmsRu\Api(new \N1Creator\SmsRu\Auth\ApiIdAuth($apiId), new \N1Creator\SmsRu\Client\Client());
```

Усиленная авторизация (с помощью api_id, логина и пароля):

```php
$client = new \N1Creator\SmsRu\Api(new \N1Creator\SmsRu\Auth\LoginPasswordSecureAuth($login, $password, $apiId), new \N1Creator\SmsRu\Client\Client());
```

Усиленная авторизация (с помощью логина и пароля):

```php
$client = new \N1Creator\SmsRu\Api(new \N1Creator\SmsRu\Auth\LoginPasswordAuth($login, $password), new \N1Creator\SmsRu\Client\Client());
```

Отправка SMS:

```php
$sms1 = new \N1Creator\SmsRu\Entity\Sms($phone1, $text1);
$sms1->translit = 1;
$sms2 = new \N1Creator\SmsRu\Entity\Sms($phone2, $text2);

$client->smsSend($sms1);
$client->smsSend($sms2);

$client->smsSend(new \N1Creator\SmsRu\Entity\SmsPool([$sms1, $sms2]));
```

Статус SMS:

```php
$send = $client->smsSend($sms);
$smsId = $send->ids[0];
$client->smsStatus($smsId);
```

Стоимость SMS:

```php
$client->smsCost(new \N1Creator\SmsRu\Entity\Sms($phone, $text));
```

Баланс:

```php
$client->myBalance();
```

Дневной лимит:

```php
$client->myLimit();
```

Отправители:

```php
$client->mySenders();
```

Проверка валидности логина и пароля:

```php
$client->authCheck();
```

Добавить номер в стоплист:

```php
$client->stoplistAdd($phone, $text);
```

Удалить номер из стоп-листа:

```php
$client->stoplistDel($phone);
```

Получить номера стоплиста:

```php
$client->stoplistGet();
```
