$(document).ready(function () {
    $(".requests-tab-title li a").click(function () {
        $(".requests-tab-title li a, .requests-list").toggleClass("active");
    });

    $(".give-feedback-btn").click(function () {
        $(".popup-layer").addClass("active");
    });

    $(".popup-close").click(function () {
        $(".popup-layer").removeClass("active");
    });

    $('.drop-down').click(function (e) {
        $('.menu-block-body').toggleClass('hide')
        e.stopPropagation()
    })
    $('body').click(function (e) {
        $('.menu-block-body').addClass('hide')
    })

    $(document).on('change', '#Reason', function () {
        console.log($(this).val())
        if ($(this).val() == 0) {
            $('#internal-project_name').closest('.form-group').hide();
            $('input[name="Feedbacks[project_name]"]').hide()
        } else {
            $('#internal-project_name').closest('.form-group').show();
            $('input[name="Feedbacks[project_name]"]').show()
        }
    })
    $(document).on('change', '#External_model_2', function () {
        console.log($(this).val())
        if ($(this).val() == 0) {
            $('#external-project_name').closest('.form-group').hide();
        } else {
            $('#external-project_name').closest('.form-group').show();
        }
    })

});