<?php use common\models\Product;  ?> 

<div class="card h-100">
        <a href="#" class="img-wrapper">
            <img class="card-img-top" src="<?php echo Product::getImageUrlById($model->id) ?>" alt="">
        </a>
        <div class="card-body">
            <h5 class="card-title">
                <a href="#" class="text-dark"><?php echo \yii\helpers\StringHelper::truncateWords($model->name, 20) ?></a>
            </h5>
            <h5><?php echo Yii::$app->formatter->asCurrency($model->price) ?></h5>
            <div class="card-text">
                <?php echo $model->description; ?>
            </div>
        </div>
        <div class="card-footer text-right">
            <div class="product-item" data-value="<?php echo $model->id ?>"><?= $model->id;?></div>
            <a data-product ="<?php echo $model->id ?>" href="<?php echo \yii\helpers\Url::to(['/cart/add']) ?>" class="btn btn-primary btn-add-to-cart">
                Add to Cart
            </a>
        </div>
</div>