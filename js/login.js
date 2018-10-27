/**
 *
 * @author João Bolsson (joaovictorbolsson@gmail.com)
 * @since 2018, Oct 26.
 */

$(function () {
    $("#formLogin").submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();

        $.post('controller/php/forms/login.php', data).done(function (response) {
            if (response) {
                console.log('logado');
                window.location.href = '';
            } else {
                console.log('n logou');
            }
        });
    });

    $("#formReset").submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();

        $.post('controller/php/forms/update.php', data).done(function (response) {
            if (response) {
                alert("Senha resetada, sua nova senha é: " + response);
            } else {
                alert("Ocorreu um erro no servidor. Contate o administrador.");
            }
        });
    });
});

function abreModal(id) {
    $(id).modal();
}