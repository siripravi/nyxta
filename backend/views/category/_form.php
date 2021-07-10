<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model abcms\shop\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(Category::getParentsList($model->id), ['prompt' => 'Select parent']) ?>
    
    <?= $form->field($model, 'ordering')->textInput() ?>

    <?= $form->field($model, 'active')->checkbox() ?>


    <?= \abcms\multilanguage\widgets\TranslationForm::widget(['form'=>$form,'model' => $model]) ?>

    <!--?= \abcms\structure\widgets\SeoForm::widget(['model' => $model]) ?-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
