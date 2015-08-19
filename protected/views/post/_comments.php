<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/vote.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/easing.js'); ?>

<?php foreach ($comments as $comment): ?>
    <div class="comment" id="c<?php echo $comment->id; ?>">

        <?php echo CHtml::link("#{$comment->id}", $comment->getUrl($post), array(
            'class' => 'cid',
            'title' => 'Permalink to this comment',
        )); ?>

        <div class="author">
            <?php echo $comment->authorLink; ?> says:
        </div>

        <div class="time">
            <?php echo date('F j, Y \a\t h:i a', $comment->create_time); ?>
        </div>

        <div class="content">
            <?php echo nl2br(CHtml::encode($comment->content)); ?>
        </div>

        <div class="vote" id="vote_<?= $comment->id ?>">
            <div class="actions">
                <a href="comment/rating" class="up" rel="nofollow"
                   onclick="v(<?= $comment->id ?>,0,<?= Yii::app()->user->id ?>); return false;">+</a>
                <span class="rating-o">
                    <span id="v<?= $comment->id ?>" class="rating">
                    <?= " " . $comment->rating_sum . " " ?>
                    </span>
                </span>
                <a href="comment/rating" class="down" rel="nofollow"
                   onclick="v(<?= $comment->id ?>,1,<?= Yii::app()->user->id ?>); return false;">-</a>
            </div>
        </div>
    </div><!-- comment -->
<?php endforeach; ?>