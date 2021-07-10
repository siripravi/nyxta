<?php
use backend\modules\image\widgets\ImageWidget;

?>

<div class="container">
    <div class="row equal-height">
        <?= ImageWidget::widget(['imageMaxCount' => 5,'key'=>$cid]) ?>
    </div>
</div>