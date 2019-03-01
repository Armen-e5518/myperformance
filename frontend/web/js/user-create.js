$('#user-first_name, #user-last_name').change(function () {
    $('#user-username').val($('#user-first_name').val().toLowerCase() + '.' + $('#user-last_name').val().toLowerCase())
})
