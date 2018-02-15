<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 14.02.18
 * Time: 17:30
 */


namespace firebase\sdk\helpers;

use GuzzleHttp;

class FireBaseSdk
{
    private $notification_obj;
    private $service_host;
    private $client;
    private $credentials;

    const METHOD = 'POST';
    const AUTH_PREFIX = 'Bearer ';

    function __construct(Notification $notification, $service_host, $credentials)
    {
        if ($notification instanceof Notification) $this->setNotificationObj($notification->jsonSerialize())->setServiceHost($service_host)->setClient()->setCredentials($credentials);
        else  throw new \InvalidArgumentException("Notification must be notification object");
    }

    /**
     * @param mixed $notification_obj
     * @return FireBaseSdk
     */
    public function setNotificationObj($notification_obj)
    {

        $this->notification_obj = $notification_obj;
        return $this;

    }

    public function notification()
    {
        return $this->send();
    }

    public function send()
    {
        return $this->client->request(
            self::METHOD,
            $this->service_host,
            [
                'json' => $this->notification_obj,
                'headers' => [
                    'Authorization' => self::AUTH_PREFIX . $this->credentials,
                ],
            ]
        );
    }

    /**
     * @return FireBaseSdk
     */
    public function setClient()
    {
        $this->client = new GuzzleHttp\Client();
        return $this;
    }

    /**
     * @param mixed $service_host
     * @return FireBaseSdk
     */
    public function setServiceHost($service_host)
    {
        $this->service_host = $service_host;
        return $this;
    }

    /**
     * @param mixed $credentials
     * @return FireBaseSdk
     */
    public function setCredentials($credentials)
    {
        $this->credentials = $credentials;
        return $this;
    }
}

