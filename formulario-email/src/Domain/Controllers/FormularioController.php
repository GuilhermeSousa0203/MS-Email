<?php

namespace Gd\Formulario\Domain\Controllers;

use PhpAmqpLib\Connection\AMQPSSLConnection;
use PhpAmqpLib\Message\AMQPMessage;

class FormularioController
{
    public function index()
    {
        require_once __DIR__ . "/../../../views/formulario-email.php";
    }

    // Envia para a queue
    public function send()
    {
        $destinatario = addslashes($_POST['destinatario']);
        $assunto = addslashes($_POST['assunto']);
        $corpo = addslashes($_POST['corpo']);

        $jsonRequest = json_encode([
            "assunto" => $assunto,
            "corpo" => $corpo,
            "destinatario" => $destinatario,
            "remetente_id" => 1,
        ]);

        $connection = new AMQPSSLConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->queue_declare('ms-email', false, false, false, false);

        $message = new AMQPMessage($jsonRequest);

        $channel->basic_publish($message, "", 'ms-email');

        $channel->close();
        $connection->close();
    }
}