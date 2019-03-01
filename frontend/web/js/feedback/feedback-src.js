$(document).ready(function () {

    $('.radio-list').each(function () {
        var value = $(this).attr('value');
        console.log(value)
        $(this).find("input[value='" + value + "']").prop("checked", true);
        $(this).find("input").prop("disabled", true);

    })

})