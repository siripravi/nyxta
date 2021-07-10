<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EstoreArticlePrice */

$this->title = 'Create Estore Article Price';
$this->params['breadcrumbs'][] = ['label' => 'Estore Article Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estore-article-price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
