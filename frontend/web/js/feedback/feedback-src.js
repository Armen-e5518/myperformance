$(document).ready(function () {

    $('.send_mail').click(function () {
        $('#mailto-href').val($(this).attr('data-href'))
    })

});