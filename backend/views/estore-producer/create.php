<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EstoreProducer */

$this->title = 'Create Estore Producer';
$this->params['breadcrumbs'][] = ['label' => 'Estore Producers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estore-producer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
