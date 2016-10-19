<?php

require "/var/www/html/download/vendor/autoload.php";

use OpenCloud\OpenStack;
use Guzzle\Http\Exception\ClientErrorResponseException;

$opts = [
    'username' => '',
    'password' => '',
    'tenantName' => ''
];

$auth_url = 'https://identity.tyo1.conoha.io/v2.0';
$container_name = 'test';
$file_name = '50MB';

try {
    $client = new OpenStack($auth_url, $opts);
    $client->authenticate();

    $service = $client->objectStoreService('Object Storage Service', 'tyo1');

    $container = $service->getContainer($container_name);
    $object = $container->getObject($file_name);
} catch (ClientErrorResponseException $e) {
    echo $e->getMessage();
}

echo 'success';

