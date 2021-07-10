<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EstoreArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estore Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estore-article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Estore Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'name:ntext',
            'sku',
            'qty_available',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
