<?php
use yii\helpers\Html;
use yii\bootstrap4\Modal;
$translatedModel = $model->translate();
?>
<?php
Modal::begin([
    'title' => 'Hello world',
    'toggleButton' => ['label' => 'click me','tag' => 'button',],
]);

echo $this->render('//catalog/detail', ['model' => $model]); 

Modal::end();
?>

