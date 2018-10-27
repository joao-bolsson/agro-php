/**
 *
 * @author João Bolsson (joaovictorbolsson@gmail.com)
 * @since 2018, Oct 26.
 */

$(function () {
    $("#formCadUser").submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();

        $.post('controller/php/forms/insert.php', data).done(function (response) {
            alert("Usuário cadastrado com sucesso, sua senha é: " + response);
        });
    });
});