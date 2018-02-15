<?php

use firebase\sdk\helpers\FireBaseSdk;
use firebase\sdk\helpers\Notification;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: dev
 * Date: 15.02.18
 * Time: 11:33
 */
class FireBaseSdkTest extends TestCase
{
    public function provideConstructorNotification()
    {
        return array(
            array("Notification 1", "Body text 1", "https://link.com/img.jpg", 'http://link.com/', 'body', 'http://192.168.1.100:8000/send_notification12'),
            array("Notification 2", "Body text 2", "https://link.com/img.jpg", 'http://fasfffdsfdas.sdfdsfas.com/', 'body', 'service.com'),
            array("Notification 3", "Body text 3", "https://link.com/img.jpg", 'http://link.com/', 12321, 'http://service.com'),
            array("Notification 4", "Body text 3", "https://link.com/img.jpg", 'http://link.com/', 12321, 'http://service.com'),
        );
    }

    public function providePositiveRequest()
    {
        return array(
            array("Notification 1", "Body text 1", "https://link.com/img.jpg", 'http://link.com/', 'body_test', 'http://192.168.1.100:8000/send_notification'),
            array("Notification 1", "Body text 1", "https://link.com/img.jpg", 'http://link.com/', 'body_suite', 'http://192.168.1.100:8000/send_notification'),
            array("Notification 1", "Body text 1", "https://link.com/img.jpg", 'http://link.com/', 'body_suite', 'http://192.168.1.100:8000/send_notification'),
        );
    }

    /**
     * @dataProvider providePositiveRequest
     */
    public function testFireBaseSdk($title, $body, $icon, $click_action, $topic, $service_host)
    {
        $notification = new Notification($title, $body, $icon, $click_action, $topic);
        $firebase = new FireBaseSdk($notification, $service_host);
        $response = $firebase->send();
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * @dataProvider provideConstructorNotification
     * @expectedException GuzzleHttp\Exception\ClientException
     */
    public function testFireBaseSdkNegative($title, $body, $icon, $click_action, $topic, $service_host)
    {
        $notification = new Notification($title, $body, $icon, $click_action, $topic);
        $firebase = new FireBaseSdk($notification, $service_host);
        $response = $firebase->send();
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * @dataProvider provideConstructorNotification
     */
    public function testFireBaseSdkNoyNotification($title, $body, $icon, $click_action, $topic)
    {
        $notification = new Notification($title, $body, $icon, $click_action, $topic);
        $this->assertInstanceOf('firebase\sdk\helpers\Notification', $notification);
    }
}