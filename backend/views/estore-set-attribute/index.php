<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EstoreSetAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estore Set Attributes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estore-set-attribute-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Estore Set Attribute', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'input',
            'name',
            'values:ntext',
            //'is_i18n',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
