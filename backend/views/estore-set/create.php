<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EstoreSet */

$this->title = 'Create Estore Set';
$this->params['breadcrumbs'][] = ['label' => 'Estore Sets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estore-set-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
