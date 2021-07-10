<?php

use dosamigos\ckeditor\CKEditor;
use common\models\Category;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'description')->widget(CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?-->
    <?=
    $form->field($model, 'description')->widget(vova07\imperavi\Widget::className(), [
        'settings' => [
            'minHeight' => 200,
        ]
    ])
    ?>
     <?= $form->field($model, 'category_id')->dropDownList(Category::getCategoriesList(), ['prompt' => 'Select Category']) ?>

    <?= $form->field($model, 'imageFile', [
        'template' => '
                <div class="custom-file">
                    {input}
                    {label}
                    {error}
                </div>
            ',
        'labelOptions' => ['class' => 'custom-file-label'],
        'inputOptions' => ['class' => 'custom-file-input']
    ])->textInput(['type' => 'file']) ?>

    <?= $form->field($model, 'quantity')->textInput()->hint("0: not available, >0 : available, keep empty if available and quanitity not tracked. <br />"
            . "If variations are available, this field will be ignored.") ?>


    <?= $form->field($model, 'price')->textInput([
        'maxlength' => true,
        'type' => 'number',
        'step' => '0.01'
    ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>
    <?= \abcms\multilanguage\widgets\TranslationForm::widget(['form'=>$form,'model' => $model]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
