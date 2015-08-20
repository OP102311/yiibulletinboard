<?php
$this->pageTitle=Yii::app()->name . ' - Registration';
$this->breadcrumbs=array(
    'Register',
);
?>
    <h1>Registration</h1>
<?=CHtml::form(); ?>
<?=CHtml::errorSummary($form); ?>

<table id="form" >
    <tr>
        <td width="150"><?=CHtml::activeLabel($form, 'username'); ?></td>
        <td><?=CHtml::activeTextField($form, 'username') ?></td>
    </tr>
    <tr>
        <td><?=CHtml::activeLabel($form, 'email'); ?></td>
        <td><?=CHtml::activeEmailField($form, 'email') ?></td>
    </tr>
    <tr>
        <td><?=CHtml::activeLabel($form, 'password'); ?></td>
        <td><?=CHtml::activePasswordField($form, 'password') ?></td>
    </tr>
    <tr>
        <td><?php $this->widget('CCaptcha', array('buttonLabel' => '<br>[change captcha]')); ?></td>
        <td><?=CHtml::activeTextField($form,'verificationCode'); ?></td>
    </tr>
    <tr>
        <td><?=CHtml::submitButton('Register', array('id' => "submit")); ?></td>
    </tr>
</table>

<?=CHtml::endForm(); ?>