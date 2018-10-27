<?php
/**
 *
 * @author João Bolsson (joaovictorbolsson@gmail.com)
 * @version 2018, Oct 26.
 */

ini_set('display_errors', true);
error_reporting(E_ALL);

session_start();

spl_autoload_register(function (string $class_name) {
    include_once '../class/' . $class_name . '.class.php';
});

$form = '';

$filter = filter_input(INPUT_POST, 'form');
if (!empty($filter)) {
    $form = $filter;
}

switch ($form) {

    case 'resetPass':
        $email = filter_input(INPUT_POST, 'email');

        $pass = Update::resetPass($email);
        echo $pass;
        break;

    default:
        break;
}