/**
 *
 * @author João Bolsson (joaovictorbolsson@gmail.com)
 * @since 2018, Oct 26.
 */

$(function () {
    loadStartPage();

    // **************************************************************************
    //                              IMPLANTAÇÃO
    // **************************************************************************

    $('#doImplementation').on('hidden.bs.modal', function () {
        document.getElementById("doImplementationIdCrop").value = 0;
        document.getElementById('formDoImplementation').reset();
    });

    $("#formDoImplementation").submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();

        $.post('controller/php/forms/insert.php', data).done(function () {
            alert("Dados salvos com sucesso!");
        }).always(function () {
            $('#doImplementation').modal('hide');
            loadStartPage();
        });
    });

    // **************************************************************************
    //                              SAFRA
    // **************************************************************************


    $('#startCrop').on('hidden.bs.modal', function () {
        document.getElementById('formStartCrop').reset();
    });

    $("#formStartCrop").submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();

        $.post('controller/php/forms/insert.php', data).done(function () {
            alert("Dados salvos com sucesso!");
        }).always(function () {
            $('#startCrop').modal('hide');
            loadStartPage();
        });
    });

    // **************************************************************************
    //                              MANUTENÇÃO
    // **************************************************************************

    $('#doMaintenance').on('hidden.bs.modal', function () {
        document.getElementById('formDoMaintenance').reset();
    });

    $("#formDoMaintenance").submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();

        $.post('controller/php/forms/insert.php', data).done(function () {
            alert("Dados salvos com sucesso!");
        }).always(function () {
            $('#doMaintenance').modal('hide');
            loadStartPage();
        });
    });

    // **************************************************************************
    //                              DEFENSIVOS
    // **************************************************************************

    $('#applyDefensives').on('shown.bs.modal', function () {
        $.post('controller/php/forms/select.php', {
            form: 'getDefensives'
        }).done(function (options) {
            document.getElementById('defensives').innerHTML = options;
        });
    });

    $('#applyDefensives').on('hidden.bs.modal', function () {
        document.getElementById('formApplyDefensives').reset();
    });

    $("#formApplyDefensives").submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();

        $.post('controller/php/forms/insert.php', data).done(function () {
            alert("Dados salvos com sucesso!");
        }).always(function () {
            $('#applyDefensives').modal('hide');
            loadStartPage();
        });
    });

    // **************************************************************************
    //                              COLHEITA
    // **************************************************************************

    $('#doHarvest').on('hidden.bs.modal', function () {
        document.getElementById('formDoHarvest').reset();
    });

    $("#formDoHarvest").submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();

        $.post('controller/php/forms/insert.php', data).done(function () {
            alert("Dados salvos com sucesso!");
        }).always(function () {
            $('#doHarvest').modal('hide');
            loadStartPage();
        });
    });

    // **************************************************************************
    //                              ESTOQUE
    // **************************************************************************

    $('#addStock').on('hidden.bs.modal', function () {
        document.getElementById('formAddStock').reset();
    });

    $("#formAddStock").submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();

        $.post('controller/php/forms/insert.php', data).done(function () {
            alert("Dados salvos com sucesso!");
        }).always(function () {
            $('#addStock').modal('hide');
        });
    });

});

function loadStartPage() {
    $.post('controller/php/forms/select.php', {
        form: 'getCropsByUser',
        id_user: 1
    }).done(function (callback) {
        if (callback) {
            document.getElementById("tbodyCrops").innerHTML = callback;
        } else {
            alert("Ocorreu um erro no servidor. Contate o administrador.");
            location.reload();
        }
    });
}

function doImplementation(id_crop) {
    document.getElementById("doImplementationIdCrop").value = id_crop;
    $('#doImplementation').modal();
}

function doMaintenance(id_crop) {
    document.getElementById("doMaintenanceIdCrop").value = id_crop;
    $('#doMaintenance').modal();
}

function applyDefensives(id_crop) {
    document.getElementById("applyDefensivesIdCrop").value = id_crop;
    $('#applyDefensives').modal();
}

function doHarvest(id_crop) {
    document.getElementById("doHarvestIdCrop").value = id_crop;
    $('#doHarvest').modal();
}

function showInfoCrop(id_crop) {
    $('#showInfoCrop').modal();

    $.post('controller/php/forms/select.php', {
        form: 'showInfoCrop',
        id_crop: id_crop
    }).done(function (report) {
        document.getElementById('divReport').innerHTML = report;
    });
}

function abreModal(id) {
    $(id).modal();
}