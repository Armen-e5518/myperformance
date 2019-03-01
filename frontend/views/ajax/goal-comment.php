<div class="comment-item flex">
    <div class="request-to">
        <img src="/users/<?= $manager->avatar; ?>" alt=""
             class="request-to-whom">
        <strong><?= $manager->first_name; ?> <?= $manager->last_name; ?></strong>

        <span class="request-date">
            <i class="far fa-clock"></i><?= date("d-m-Y" , strtotime($goalsFeedback->date)); ?></span>
        <a href="javascript:void(0);" class="btn disagree inline-block transition">Pending</a>
    </div>
    <p><?= $goalsFeedback->comment; ?></p>
</div>