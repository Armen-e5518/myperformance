<div class="goal-item">
    <div class="goals-inputs-content" data-goals-id="">
        <div class="post has-border objective-post relative description-content">
            <label for="goals-description" class="post-edit absolute">
                <em title="Edit">Edit</em>
                <i class="fas fa-pencil-alt fa-icon-prop edit-d" title="Edit"></i>
                <em>Delete</em>
                <a class="" href="/goals/delete?id=<?=$goal->id?>"
                   title="Delete object"
                   data-confirm="Are you sure you want to delete this item?"
                   data-method="post">
                    <i class="fas fa-trash-alt fa-icon-prop"></i>
                </a>
            </label>
            <span class="post-title semibold">Objective <?= $contentLength; ?></span>
            <textarea readonly name="Goals[description]" class="description" rows="1"></textarea>
        </div>
        <div class="post has-border relative user-comment-content">
            <label for="goals-user_comment" class="post-edit absolute">
                <em title="Edit">Edit</em>
                <i class="fas fa-pencil-alt fa-icon-prop edit-d" title="Edit"></i></label>
            <span class="post-title semibold">My comments</span>
            <textarea readonly name="Goals[user_comment]" class="user_comment"
                      rows="1"></textarea>
        </div>
    </div>
    <div class="post post-comments relative">
        <a href="javascript:void(0);" class="post-edit absolute give-feedback-btn give-feedback-btn"><span>Request feedback</span><i
                    class="fas fa-plus fa-icon-prop"></i></a>
    </div>
</div>
<br>
<br>