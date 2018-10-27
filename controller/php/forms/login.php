<?php
/**
 * @author João Bolsson (joaovictorbolsson@gmail.com)
 * @version 2018, Oct 26.
 */
ini_set('display_errors', true);
error_reporting(E_ALL);

session_start();

include_once '../class/Login.class.php';
include_once '../class/Logger.class.php';

$login = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

if (is_null($login) || is_null($senha)) {
    echo "false";
} else {
    $logar = Login::getInstance()->login($login, $senha, $retorno = false);

    if ($logar != 0) {
        echo "true";
    } else {
        echo "false";
    }
}

