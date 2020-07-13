<?php

namespace Sco\Aria2;


class JsonRpcClient
{
    protected $url    = '';
    private   $uniqId = 1;
    /**
     * @var null
     */
    private $token;
    /**
     * @var false|resource
     */
    private $ch;

    public function __construct(string $url, $token = null)
    {
        $this->url = $url;

        $this->token = $token;
        $this->ch    = curl_init($url);

        $timeout = 5;
        curl_setopt_array($this->ch, [
            CURLOPT_CONNECTTIMEOUT => $timeout,
            CURLOPT_TIMEOUT        => $timeout,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_POST           => true,
        ]);
    }

    public function __destruct()
    {
        curl_close($this->ch);
    }

    public function __call(string $name, array $args)
    {
        return $this->call($name, $args);
    }

    public function call(string $name, $args)
    {
        if ($this->token) {
            array_unshift($args, "token::{$this->token}");
        }

        $json = json_encode([
            'jsonrpc' => '2.0',
            'id'      => base_convert($this->uniqId++, 10, 36),
            'method'  => "aria2.{$name}",
            'params'  => $args,
        ]);

        curl_setopt($this->ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json; charset=utf-8'
        ]);

        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $json);

        $response = curl_exec($this->ch);

        if($response===false) {
            trigger_error(curl_error($this->ch));
        }

        $response = json_decode($response, true);

        return $response;
    }
}
