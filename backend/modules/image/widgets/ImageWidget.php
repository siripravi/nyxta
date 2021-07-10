<?php

// your_app/votewidget/VoteWidget.php

namespace backend\modules\image\widgets;

use backend\modules\image\widgets\assets\ImageWidgetAsset;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use backend\modules\image\models\Image;
use yii\helpers\Url;

class ImageWidget extends Widget {

    private $id;
	
    public $key;
	
    public $imageMaxCount;
    private $imageData;
    public $uploadUrl;
   
    public function init() {
        parent::init();
        $this->imageData = Array($this->imageMaxCount);       
        $this->uploadUrl = Url::to(['/uploader/default/upload-photo', 'imid' => $this->key]);       
    }

    public function getImages() {      
        $sql = "SELECT
                        id, name, filename                       
                        FROM tbl_image
                        where name = '$this->key' ";

        $images = Image::findBySql($sql)->all();
        $data = ArrayHelper::toArray($images, [
                    'backend\modules\image\models\Image' => [
                        'id',
                        'name',
                        'filename',
                        // the key name in array result => property name
                        'createTime' => 'created',
                        // the key name in array result => anonymous function
                        'imageSrc' => function ($image) { 
                            return Url::to(['/uploader/default/create', 'id' => $image->id, 'version' => 'large']);
                        },
                    ],
        ]);
//echo '<pre>'; print_r($data); die;
        return $data;
    }

    public function run() {
        ImageWidgetAsset::register($this->getView());
        $this->imageData = $this->getImages($this->key);
       // $session = \Yii::$app->session;
       // $lgid = $session['Wizard.form'];
        return $this->render('imagewidget', ['images' => $this->imageData, 'uploadUrl' => $this->uploadUrl]);
    }

    public function getViewPath() {
        return '@backend/modules/image/views/';
    }

}

?>