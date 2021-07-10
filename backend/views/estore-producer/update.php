<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EstoreProducer */

$this->title = 'Update Estore Producer: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Estore Producers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estore-producer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
