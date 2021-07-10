<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use abcms\library\grid\InlineFormGridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
$translatedModel = $model->translate();
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $translatedModel,
        'attributes' => [
            'id',
            [
                'attribute' => 'image',
                'format' => ['html'],
                'value' => fn() => Html::img($model->getImageUrl(), ['style' => 'width: 50px']),
            ],
            [
                'attribute' => 'name',
                'options' => [
                    'style' => 'white-space: normal'
                ]
            ],
             'categoryName',

            'description:html',
            'price:currency',
            'quantity',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => fn() => Html::tag('span', $model->status ? 'Active' : 'Draft', [
                    'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                ]),
            ],
            'created_at:datetime',
            'updated_at:datetime',
            'createdBy.username',
            'updatedBy.username',
        ],
    ]) ?>
      <?=
    \abcms\multilanguage\widgets\TranslationView::widget([
        'model' => $model,
    ])
    ?>
<h2><br />Variations</h2>

    <?=
    InlineFormGridView::widget([
        'dataProvider' => $variationDataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'footer' => '<b>'.($variation->isNewRecord ? 'Add new item:' : 'Update Variation').'</b>',
            ],
            'id',
            [
                'header' => 'Variation',
                'value' => function($data) {
                    return $data->getText();
                },
                'footer' => $this->render('_variation-input', ['attributes'=>$attributes]),
            ],
            [
                'attribute' => 'quantity',
                'footer' => Html::activeTextInput($variation, 'quantity', ['class' => 'form-control', 'placeholder' => 'Quantity']).Html::error($variation, 'quantity', ['class' => 'help-block']),
                'footerOptions' => ['class' => $variation->hasErrors('quantity') ? 'has-error' : ''],
            ],
            [
                'class' => yii\grid\ActionColumn::className(),
                'template' => '{update} {delete}',
                'footer' => Html::submitButton($variation->isNewRecord ? 'Create' : 'Update', ['class' => $variation->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])
                .(!$variation->isNewRecord ? ' '.Html::a('Cancel', Url::current(['variationId'=>null]), ['class'=>'btn btn-danger']) : ''),
                'buttons' => [
                    'update' => function ($url, $variation, $key) {
                        return Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-pencil"]), Url::current(['variationId'=>$variation->id]));
                    },
                    'delete' => function ($url, $variation, $key) {
                        return Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-trash"]), ['delete-variation', 'id'=>$variation->id], [
                                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                            'data-method' => 'post',
                                        ]);
                    },
                ],
            ],
        ],
    ]);
    ?>

</div>
