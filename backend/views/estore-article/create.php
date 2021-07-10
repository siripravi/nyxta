<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EstoreArticle */

$this->title = 'Create Estore Article';
$this->params['breadcrumbs'][] = ['label' => 'Estore Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estore-article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
