<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap4\Modal;
/* @var $this yii\web\View */
/** @var \yii\data\ActiveDataProvider $dataProvider */

$this->title = 'My Yii Application';
?>
<div class="banner banner1" style="background-image:url(<?php if ($selected_category) echo $selected_category->getCategImgUrl();
else echo \backend\models\SiteSettings::getMainBannerUrl() ?>)">
    <div class="container">
        <h2>Great Offers on <span><?php if ($selected_category) echo $selected_category->name;
else echo 'Electronics' ?></span> Flat <i>35% Discount</i></h2> 
    </div>
</div> 
<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="col-md-4">
       <h3>Categories</h3>
       <!--Left Side Filter Criteria -->
       <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-name asd">
                                        <a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>New Arrivals
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body panel_text">
                                        <?= Html::beginForm(['catalog/list'], 'get') ?>
                                        <ul>
                                            <?php foreach ($categories as $category): ?>
                                                <?php if ($chld_categ = $category->getCategories()->asArray()->all()): ?>
                                                    <li><?= $category->name ?></li>
                                                    <?php foreach ($chld_categ as $chldcategory): ?>
                                                        <li><input type="submit" name="choosed_category" class="btn btn-link" value="<?= $chldcategory['name'] ?>"></li>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <?php if (!$category->parent_id): ?>
                                                        <li><input type="submit" name="choosed_category" class="btn btn-link" value="<?= $category->name ?>"></li>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?= Html::endForm(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
       <h3>Price</h3>
                    <div class="w3ls_mobiles_grid_left_grid_sub">
                        <div class="ecommerce_color ecommerce_size">
                            <?= Html::beginForm(['catalog/list'], 'get') ?>
                            <ul>
                                <li><input type="submit" name="less100" class="btn btn-link" value="Below $ 100"></li>
                                <li><input type="submit" name="from100to500" class="btn btn-link" value="$ 100-500"></li>
                                <li><input type="submit" name="pr1k_10k" class="btn btn-link" value="$ 1k-10k"></li>
                                <li><input type="submit" name="pr10k_20k" class="btn btn-link" value="$ 10k-20k"></li>
                                <li><input type="submit" name="more20k" class="btn btn-link" value="$ Above 20k"></li>
                            </ul>
                            <?= Html::endForm(); ?>
                        </div>
                    </div>
       </div>
       <!-- Right Side Search Results -->
       <div class="col-md-8">
        <?php  echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{summary}<div class="row">{items}</div>{pager}',
            'itemView' => '_product_item',
            'itemOptions' => [
                'class' => 'col-lg-4 col-md-6 mb-4 product-item'
            ],
            'pager' => [
                'class' => \yii\bootstrap4\LinkPager::class
            ]
        ]) ?>
 </div>  
    </div>
</div>
</div>