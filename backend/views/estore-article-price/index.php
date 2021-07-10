<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EstoreArticlePriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estore Article Prices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estore-article-price-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Estore Article Price', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'article_id',
            'currency_id',
            'qty',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
