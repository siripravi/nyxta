<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EstoreArticlePrice */

$this->title = 'Update Estore Article Price: ' . $model->article_id;
$this->params['breadcrumbs'][] = ['label' => 'Estore Article Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->article_id, 'url' => ['view', 'article_id' => $model->article_id, 'currency_id' => $model->currency_id, 'qty' => $model->qty]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estore-article-price-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
