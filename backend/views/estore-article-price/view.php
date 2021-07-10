<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EstoreArticlePrice */

$this->title = $model->article_id;
$this->params['breadcrumbs'][] = ['label' => 'Estore Article Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="estore-article-price-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'article_id' => $model->article_id, 'currency_id' => $model->currency_id, 'qty' => $model->qty], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'article_id' => $model->article_id, 'currency_id' => $model->currency_id, 'qty' => $model->qty], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'article_id',
            'currency_id',
            'qty',
            'price',
        ],
    ]) ?>

</div>
