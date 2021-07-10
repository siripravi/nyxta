<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EstoreProduct */

$this->title = 'Create Estore Product';
$this->params['breadcrumbs'][] = ['label' => 'Estore Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estore-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
