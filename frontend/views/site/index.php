<?php

use yii\helpers\Html;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */

//!--$this->name = 'My Yii Application';
?>
<!-- banner -->
<div class="banner" style="background-image:url(<?= \backend\models\SiteSettings::getMainBannerUrl() ?>) ">
    <div class="container">
        <h3>Bracelets. Bands. Stickers. Keychains. <span>Special Offers</span></h3>
    </div>
</div>
<!-- //banner --> 

<!-- banner-bottom1 -->
<div class="banner-bottom1">
    <div class="agileinfo_banner_bottom1_grids">
        <div class="col-md-7 agileinfo_banner_bottom1_grid_left">
            <h3>Grand Opening Event With flat<span>20% <i>Discount</i></span></h3>
            <a href="products.html">Shop Now</a>
        </div>
        <div class="col-md-5 agileinfo_banner_bottom1_grid_right">
            <h4>hot deal</h4>
            <div class="timer_wrap">
                <div id="counter"> </div>
            </div>
            <!--<script src="js/jquery.countdown.js"></script>
            <script src="js/script.js"></script>  -->
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //banner-bottom1 --> 
 

<!-- new-products -->
<div class="new-products">
    <div class="container">
        <h3>New Products</h3>
        <div class="agileinfo_new_products_grids">
            <?php echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{summary}<div class="row">{items}</div>{pager}',
            'itemView' => 'detail',  // '_product_item',
            'itemOptions' => [
                'class' => 'col-lg-4 col-md-6 mb-4 product-item'
            ],
            'pager' => [
                'class' => \yii\bootstrap4\LinkPager::class
            ]
        ]) ?>

            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<!-- //new-products -->
<!-- top-brands -->
<div class="top-brands">
    <div class="container">
        <h3>Top Brands</h3>
        <div class="row">

          
        </div>

    </div>
</div>
<!-- //top-brands --> 