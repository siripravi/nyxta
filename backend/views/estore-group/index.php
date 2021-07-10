<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EstoreGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estore Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estore-group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Estore Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_group_id',
            'cover_image_id',
            'images_list:ntext',
            'name:ntext',
            //'teaser:ntext',
            //'text:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
