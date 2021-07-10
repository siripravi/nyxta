<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EstoreGroup */

$this->title = 'Create Estore Group';
$this->params['breadcrumbs'][] = ['label' => 'Estore Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estore-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
