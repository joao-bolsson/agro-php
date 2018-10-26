<?php
/**
 *
 * @author João Bolsson (joaovictorbolsson@gmail.com)
 * @version 2018, Oct 25.
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

    case 'getCropsByUser':
        // can get this field by session
        $id_user = filter_input(INPUT_POST, 'id_user');

        $crops = Select::getCropsByUser($id_user);

        $tbody = "";
        foreach ($crops as $crop) {
            if ($crop instanceof Crop) {
                $tbody .= "<tr>";
                $tbody .= "<td>" . $crop->getId() . "</td>";
                $tbody .= "<td>" . $crop->getCultureName() . "</td>";
                $tbody .= "<td>" . $crop->getStart() . "</td>";
                $tbody .= "<td>" . $crop->getStatus() . "/3</td>";

                $btnRel = new Button('', 'btn btn-default btn-sm', "rel(" . $crop->getId() . ")", "data-toggle = \"tooltip\"", 'Relatório', 'file-text');

                $btnImpl = new Button('', 'btn btn-primary btn-sm', "doImplementation(" . $crop->getId() . ")", "data-toggle = \"tooltip\"", 'Implementação', 'pencil');

                $div = "<div class=\"btn-group\">" . $btnRel . $btnImpl . "</div>";
                $tbody .= "<td>" . $div . "</td>";
            }
        }

        echo $tbody;
        break;

    case 'getInfoImplementation':
        $id_crop = filter_input(INPUT_POST, 'id_crop');

        echo json_encode(Select::getInfoImplementation($id_crop));
        break;

    case 'getInfoMaintenance':
        $id_crop = filter_input(INPUT_POST, 'id_crop');

        echo json_encode(Select::getInfoMaintenance($id_crop));
        break;

    case 'getInfoHarvest':
        $id_crop = filter_input(INPUT_POST, 'id_crop');

        echo json_encode(Select::getInfoHarvest($id_crop));
        break;

    case 'getCultures':
        echo json_encode(Select::getCultures());
        break;

    case 'getCultureTypes':
        echo json_encode(Select::getCultureTypes());
        break;

    case 'getStock':
        // can get this field by session
        $id_user = filter_input(INPUT_POST, 'id_user');

        echo json_encode(Select::getStock($id_user));
        break;

    default:
        break;
}