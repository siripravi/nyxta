<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EstoreGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estore-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_group_id')->textInput() ?>

    <?= $form->field($model, 'cover_image_id')->textInput() ?>

    <?= $form->field($model, 'images_list')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'teaser')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
