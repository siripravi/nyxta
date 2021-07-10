<?php

use yii\helpers\Html;
use backend\modules\image\widgets\ImageWidget;
/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Update Product: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <!--?= $this->render('_form', [
        'model' => $model,
    ]) ?-->
    
   
<!--?= yii\bootstrap4\Progress::widget(['percent' => 60, 'label' => 'test']) ?-->
<?= 
 yii\bootstrap4\Tabs::widget([
      'items' => [
          [
              'label' => 'Product',
              'content' => $this->render('_form', [
        'model' => $model,
    ]),
              'active' => true
          ],
        /*  [
              'label' => 'Two',
              'content' => 'Anim pariatur cliche...',
             // 'headerOptions' => [...],
             'options' => ['id' => 'myveryownID'],
          ], */
          [
              'label' => 'Product Images',
              'content' => ImageWidget::widget(['imageMaxCount' => 5,'key'=>$model->id]),
              //'url' => 'http://www.example.com',
          ],
          /*[
              'label' => 'Dropdown',
              'items' => [
                   [
                       'label' => 'DropdownA',
                       'content' => 'DropdownA, Anim pariatur cliche...',
                   ],
                   [
                       'label' => 'DropdownB',
                       'content' => 'DropdownB, Anim pariatur cliche...',
                   ],
                   [
                       'label' => 'External Link',
                       'url' => 'http://www.example.com',
                   ],
              ],
          ], */
      ],
  ]);        
        
        
        
?>

</div>
