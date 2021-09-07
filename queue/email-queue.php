<?php

use PhpAmqpLib\Connection\AMQPSSLConnection;

require_once __DIR__ . "/vendor/autoload.php";

$connection = new AMQPSSLConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('ms-email', false, false, false, false);

$channel->basic_consume('ms-email', "", false, false, false, false, function($message){
    try {
        $parametros = json_decode($message->body, TRUE);
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, 'http://localhost:8030/email/enviar');
        curl_setopt ($ch, CURLOPT_POST, true);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $parametros);
        $file_contents = curl_exec($ch);
        curl_close($ch);
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
});

while ($channel->is_open()) {
    $channel->wait();
}

$channel->close();
$connection->close();