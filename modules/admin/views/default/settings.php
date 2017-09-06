<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Prices Settings';
?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Saved!</h4>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php $form = ActiveForm::begin(); ?>

<?php echo $form->field($model, 'appName'); ?>

<?php echo $form->field($model, 'adminEmail'); ?>

<?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end(); ?>
