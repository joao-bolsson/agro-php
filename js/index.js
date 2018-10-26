/**
 *
 * @author João Bolsson (joaovictorbolsson@gmail.com)
 * @since 2017, 29 May.
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
    //                              DEFENSIVOS
    // **************************************************************************

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

function applyDefensives(id_crop) {
    document.getElementById("applyDefensivesIdCrop").value = id_crop;
    $('#applyDefensives').modal();
}

function abreModal(id) {
    $(id).modal();
}