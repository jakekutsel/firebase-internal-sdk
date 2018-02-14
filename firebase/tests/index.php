<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 14.02.18
 * Time: 17:58
 */


require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../sdk/helpers/Notification.php';
require __DIR__ . '/../sdk/FireBaseSdk.php';

$notif = new firebase_sdk\helpers\Notification("test", "test", "test", "test", '/topics/blog');
$before = new firebase_sdk\FireBaseSdk($notif, 'http://192.168.1.100:8000/list');
$before->notification();