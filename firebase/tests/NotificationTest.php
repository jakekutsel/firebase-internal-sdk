<?php

use firebase\sdk\helpers\Notification;
use PHPUnit\Framework\TestCase;

class NotificationTest extends TestCase
{
    /**
     * @dataProvider provideConstructor
     * @expectedException InvalidArgumentException
     */
    public function testConstructor($title, $body, $icon, $click_action, $topic)
    {
        new Notification($title, $body, $icon, $click_action, $topic);
    }

    public function provideConstructor ()
    {
        return array (
            array ("Notification 1", "Body text 1", "https://link.com/img.jpg", 'http://link.com/', 'body'),
            array ("Notification 2", "Body text 2", "htt://link.com/img.jpg", 'http://link.com/', 'body'),
            array ("Notification 3", "Body text 3", "https://link.com/img.jpg", 'http://link.com/', 12321)
        );
    }
}
