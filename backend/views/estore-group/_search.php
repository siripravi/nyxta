<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EstoreGroupSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estore-group-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parent_group_id') ?>

    <?= $form->field($model, 'cover_image_id') ?>

    <?= $form->field($model, 'images_list') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'teaser') ?>

    <?php // echo $form->field($model, 'text') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
