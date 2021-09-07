<?php

use Gd\Formulario\Domain\Controllers\FormularioController;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        return [
            '/' => [FormularioController::class, 'index'],
        ];
        break;
    case 'POST':
        return [
            '/' => [FormularioController::class, 'send'],
        ];
        break;
    default:
        return [];
        break;
}