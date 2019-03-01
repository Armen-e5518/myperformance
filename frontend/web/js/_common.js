$(document).ready(function () {
    $(document).on('click', '.edit-d', function () {
        EditIconState($(this));
    })
    $(document).on('click', '.fa-save', function () {
        SaveIconState($(this));
        $("textarea").each(function (textarea) {
            $(this).height($(this)[0].scrollHeight - 32);
        });
    })

    $("textarea").each(function (textarea) {
        $(this).height($(this)[0].scrollHeight - 32);
    });


    $('.accordion-m .date').click(function () {
        $(this).closest('.accordion-m').find('ul').toggleClass('hide-a');
    });
    // $('.accordion-m .active').closest('ul').removeClass('hide-a');

})

function EditIconState(ob) {
    ob.removeClass('fa-pencil-alt').addClass('fa-save').attr('title', 'Save');
    ob.closest('.has-border').find('textarea').addClass('active-text').prop('readonly', false).focus();
    ob.closest('.has-border').find('em:first').html('Save');
}

function SaveIconState(ob) {
    ob.removeClass('fa-save').addClass('fa-pencil-alt').attr('title', 'Edit');
    ob.closest('.has-border').find('textarea').removeClass('active-text').prop('readonly', true);
    ob.closest('.has-border').find('em:first').html('Edit');
}






