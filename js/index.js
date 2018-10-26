/**
 *
 * @author João Bolsson (joaovictorbolsson@gmail.com)
 * @since 2017, 29 May.
 */

$(function () {
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
});