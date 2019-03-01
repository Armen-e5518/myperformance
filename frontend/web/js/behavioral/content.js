$(document).ready(function () {
    behavioral.GetBehs();
    $(document).on('change', '.user_comment', function () {
        behavioral.SaveUserComment($(this).attr('data-id'), $(this).val());
    });
    $(document).on('click', '.request_feedback', function () {
        if ($('#users').val()) {
            behavioral.RequestFeedback($('#users').val(), $(this).attr('data-id'));
            $(".popup-layer").removeClass('active');
        } else {
            behavioral.RequestFeedback($('#manager-name').attr('data-id'), $(this).attr('data-id'));
            $(".popup-layer").removeClass('active');
        }
    })


    $(document).on('click', '.give-feedback-btn', function () {
        $('.request_feedback').attr('data-id', $(this).attr('data-id'))
        $(".popup-layer").addClass("active");
    });
    $(".popup-close").click(function () {
        $(".popup-layer").removeClass("active");
    });
// <i class="far fa-save"></i>

});

var behavioral = {
    GetBehs: function () {
        var data = {};
        data.year = _Year;
        $.ajax({
            type: "POST",
            url: "/ajax/get-all-behs",  //actionGetCurrentUserBeh
            data: data,
            success: function (res) {
                $('#behavioral').html(res);
                $("textarea").each(function (textarea) {
                    $(this).height($(this)[0].scrollHeight - 32);
                });
            }
        });
    },
    SaveUserComment: function (id, comment) {
        var data = {};
        data.id = id;
        data.comment = comment;
        $.ajax({
            type: "POST",
            url: "/ajax/save-user-comment-by-beh-id",  //actionGetCurrentUserBeh
            data: data,
            success: function (res) {
                // SaveIconState();
            }
        });
    },
    RequestFeedback: function (manager_id, beh_id) {
        var ob = this;
        var data = {};
        data.manager_id = manager_id;
        data.beh_id = beh_id;
        $.ajax({
            type: "POST",
            url: "/ajax/beh-request-feedback",  //actionGetCurrentUserBeh
            data: data,
            success: function (res) {
                ob.GetBehs();
                $(".popup-layer").removeClass("active");
            }
        });
    }
}
