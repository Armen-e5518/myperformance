$(document).ready(function () {
    var clickAddObjectiveCount = 0;
    var contentLength = 0;
    $(document).on("click", "#add-objective", function () {
        clickAddObjectiveCount++;
        if (clickAddObjectiveCount == 1) {
            contentLength = $(".goals-inputs-content").length + 1;
        } else {
            contentLength = contentLength + 1;
        }
        $.ajax({
            type: "POST",
            url: "/ajax/get-goals-input-content",
            data: {contentLength: contentLength},
            success: function (res) {
                if (res) {
                    $(".goals-all-content").append(res);
                }
            }
        });
    });

    $(document).on('change', 'textarea', function () {
        var ob = $(this);
        var content = $(this).closest(".goals-inputs-content");
        var description = $(content).find('.description').val();
        var userComment = $(content).find('.user_comment').val();
        if (description || userComment) {
            var goalsId = $(content).data('goals-id');
            var data = {
                goalsId: goalsId,
                description: description,
                userComment: userComment,
                year: _Year
            };
            console.log('goalsId', goalsId);
            if (goalsId) {
                $.ajax({
                    type: "POST",
                    url: "/ajax/edit-goal",
                    data: data
                });
            } else {
                $.ajax({
                    type: "POST",
                    url: "/ajax/create-goal",
                    data: data,
                    success: function (id) {
                        if (id) {
                            $(content).attr('data-goals-id', id);
                            (content).data('goals-id', id);
                            content.find('.give-feedback-btn').attr('data-id', id);
                            ob.closest('.goal-item').find('.give-feedback-btn').attr('data-id', id);
                        }
                    }
                });
            }

        }
    });

    $(document).on('click', '.request_feedback', function () {
        if ($('#users').val()) {
            goals.RequestFeedback($('#users').val(), $(this).attr('data-id'));
            $(".popup-layer").removeClass('active');
        } else {
            goals.RequestFeedback($('#manager-name').attr('data-id'), $(this).attr('data-id'));
            $(".popup-layer").removeClass('active');
        }
    });

    $(document).on('click', '.give-feedback-btn', function () {
        $('.request_feedback').attr('data-id', $(this).attr('data-id'));
        $(".popup-layer").addClass('active');
    });

    $('.popup-close').click(function () {
        $(".popup-layer").removeClass('active');
    });
});
var goals = {
    RequestFeedback: function (manager_id, goal_id) {
        console.log('manager_id', manager_id);
        console.log('goal_id', goal_id);
        var data = {};
        data.manager_id = manager_id;
        data.goal_id = goal_id;
        $.ajax({
            type: "POST",
            url: "/ajax/goal-request-feedback",  //actionGetCurrentUserBeh
            data: data,
            success: function (res) {
                if (res) {
                    var goalItemContent = $("[data-goals-id = " + data.goal_id + "]").closest(".goal-item-content");
                    console.log('goalItemContent', goalItemContent);
                    $(goalItemContent).find(".post-comments").append(res);
                }

            }
        });
    }
};