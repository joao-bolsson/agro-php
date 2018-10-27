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
});