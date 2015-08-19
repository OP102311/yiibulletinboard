<?php foreach ($comments as $comment): ?>
    <div class="comment" id="c<?php echo $comment->id; ?>">

        <?php echo CHtml::link("#{$comment->id}", $comment->getUrl($post), array(
            'class' => 'cid',
            'title' => 'Permalink to this comment',
        )); ?>
        <?php
        echo CHtml::ajaxButton('+',
            Yii::app()->createUrl('comment/rating'),
            array('type' => 'POST',
                'data' => array(
                    'comment_id' => $comment->id,//id of rated comment
                    'vote_type' => 1),//0 - minus,  1 - plus
            ));
        echo CHtml::ajaxButton('-',
            Yii::app()->createUrl('comment/rating'),
            array('type' => 'POST',
                'data' => array(
                    'comment_id' => $comment->id,//id of rated comment
                    'vote_type' => 0),//0 - minus,  1 - plus
            ));
        ?>

        <div class="author">
            <?php echo $comment->authorLink; ?> says:
            <?php // url: "'.Yii::app()->createUrl('post/'.$comment->post_id.'/'.$comment->getPostName($post)).'",
            ?>
        </div>

        <div class="time">
            <?php echo date('F j, Y \a\t h:i a', $comment->create_time); ?>
        </div>

        <div class="content">
            <?php echo nl2br(CHtml::encode($comment->content)); ?>
        </div>
        <div class="rating" id="rating_info_<?= $comment->id ?>">
            <?php

            echo "Rating: <strong>" . $comment->rating_sum . "</strong>";
            echo " " . $comment->rating_count . " votes";
            ?>
        </div>
    </div><!-- comment -->
<?php endforeach; ?>