<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EstoreGroup */

$this->title = 'Update Estore Group: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Estore Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estore-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
