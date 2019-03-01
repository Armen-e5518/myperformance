$(document).ready(function () {
    Impact.GetBehs();
    $(document).on('change', '.user_comment', function () {
        Impact.SaveUserComment($(this).attr('data-id'), $(this).val());
    });
    $(document).on('click', '.request_feedback', function () {
        if ($('#users').val()) {
            Impact.RequestFeedback($('#users').val(), $(this).attr('data-id'));
            $(".popup-layer").removeClass('active');
        } else {
            Impact.RequestFeedback($('#manager-name').attr('data-id'), $(this).attr('data-id'));
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

});
var Impact = {
    GetBehs: function () {
        var data = {};
        data.year = _Year;
        $.ajax({
            type: "POST",
            url: "/ajax/get-all-impacts",  //actionGetCurrentUserBeh
            data: data,
            success: function (res) {
                $('#Impact').html(res);
                $("textarea").each(function (textarea) {
                    console.log('okk')
                    $(this).height($(this)[0].scrollHeight - 20);
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
            url: "/ajax/save-user-comment-by-impact-id",  //actionGetCurrentUserBeh
            data: data,
            success: function (res) {

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
            url: "/ajax/impact-request-feedback",  //actionGetCurrentUserBeh
            data: data,
            success: function (res) {
                ob.GetBehs();
                $(".popup-layer").removeClass("active");
            }
        });
    }
}
