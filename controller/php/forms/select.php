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
        $id_user = $_SESSION['id'];

        $crops = Select::getCropsByUser($id_user);

        $tbody = "";
        foreach ($crops as $crop) {
            if ($crop instanceof Crop) {
                $status = $crop->getStatus();

                $tbody .= "<tr>";
                $tbody .= "<td>" . $crop->getId() . "</td>";
                $tbody .= "<td>" . $crop->getCultureName() . "</td>";
                $tbody .= "<td>" . $crop->getStart() . "</td>";
                $tbody .= "<td>" . $status . "/3</td>";

                $btnRel = new Button('', 'btn btn-default btn-sm', "showInfoCrop(" . $crop->getId() . ")", "data-toggle = \"tooltip\"", 'Relatório', 'file-text');

                $btns = $btnRel;

                if ($status == 0) {
                    $btns .= new Button('', 'btn btn-primary btn-sm', "doImplementation(" . $crop->getId() . ")", "data-toggle = \"tooltip\"", 'Implementação', 'pencil');
                }

                if ($status == 1) {
                    // manutencao
                    $btns .= new Button('', 'btn btn-primary btn-sm', "doMaintenance(" . $crop->getId() . ")", "data-toggle = \"tooltip\"", 'Manutenção', 'bitcoin');
                    $btns .= new Button('', 'btn btn-primary btn-sm', "applyDefensives(" . $crop->getId() . ")", "data-toggle = \"tooltip\"", 'Aplicar Defensivos', 'circle');
                }

                if ($status == 2) {
                    // colheita
                    $btns .= new Button('', 'btn btn-primary btn-sm', "doHarvest(" . $crop->getId() . ")", "data-toggle = \"tooltip\"", 'Colheita', 'gear');
                }

                $div = "<div class=\"btn-group\">" . $btns . "</div>";
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
        $id_user = $_SESSION['id'];

        echo json_encode(Select::getStock($id_user));
        break;

    case 'getDefensives':
        $id_user = $_SESSION['id'];
        $types = Select::getDefensives($id_user);
        $opt = "";
        foreach ($types as $type) {
            if ($type instanceof Product) {
                $opt .= "<option value=\"" . $type->getId() . "\">" . $type->getDescription() . "</option>";
            }
        }
        echo $opt;
        break;

    case 'showInfoCrop':
        $id_crop = filter_input(INPUT_POST, 'id_crop');

        $reportImpl = "<h4>Implementação</h4><hr/>" . Select::getReportImplementation($id_crop);
        $reportMaint = "<h4>Manutenção</h4><hr/>" . Select::getReportMaintenance($id_crop);
        $reportHarv = "<h4>Colheita</h4><hr/>" . Select::getReportHarvest($id_crop);

        echo $reportImpl . $reportMaint . $reportHarv;
        // TODO: resultados
//        $reportImpl = "<h4>Relatório</h4><hr/>" . Select::getReportImplementation($id_crop);
        break;

    default:
        break;
}