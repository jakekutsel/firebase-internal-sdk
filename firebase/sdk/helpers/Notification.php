<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 14.02.18
 * Time: 17:42
 */

namespace firebase\sdk\helpers;


use Prophecy\Exception\InvalidArgumentException;

class Notification
{
    private $title;
    private $body;
    private $icon;
    private $click_action;
    private $topic;

    const TOPIC_PREFIX = "/topics/";


    function __construct($title, $body, $icon, $click_action, $topic)
    {
        $this->setTitle($title)->setBody($body)->setIcon($icon)->setClickAction($click_action)->setTopic($topic);
    }

    /**
     * @param mixed $title
     * @return Notification
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param mixed $body
     * @return Notification
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param mixed $icon
     * @return Notification
     */
    public function setIcon($icon)
    {
        if (substr( $icon, 0, 5 ) != "https")
            throw new InvalidArgumentException("Icon must be start https");
        $this->icon = $icon;
        return $this;
    }

    /**
     * @param mixed $click_action
     * @return Notification
     */
    public function setClickAction($click_action)
    {
        $this->click_action = $click_action;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @param mixed $topic
     * @return Notification
     */
    public function setTopic($topic)
    {

        if (substr( $topic, 0, 9 ) != "/topics/") $topic=self::TOPIC_PREFIX.$topic;
        $this->topic = $topic;
        return $this;
    }
}