<?php

namespace backend\modules\image\controllers;

use yii\web\Controller;
use yii\helpers\Html;
use backend\modules\image\models\Image;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

/**
 * Default controller for the `image` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public $images;

    public function actionIndex() {
       
          $session = \Yii::$app->session;
        $lgid = $session['cid'];
        
        if (!empty($lgid)) {
            $sql = "SELECT
                        id                        
                        FROM tbl_image
                        where name = '$lgid' ";
            $count = 0;
            $images = Image::findBySql($sql)->all();
            $dataProvider = new ActiveDataProvider([
                'query' => Image::findBySql($sql),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
        }
        $pics = [];
        // if(!empty($images))
        foreach ($images as $img) {    //var_dump($img); die;
            //  echo $img->filename;
            $pics[$img->id] = $img->filename;
            //$pics['imageSrc'] = "";
        }
        return $this->render('index', ['lgid' => $lgid, 'pics' => $pics, 'dataProvider' => $dataProvider]);
    }

    /**
     * Creates and renders a new version of a specific image.
     * @param integer $id the image id.
     * @param string $version the name of the image version.
     * @throws CHttpException if the requested version is not defined.
     */
    public function actionCreate($id, $version) {
        $versions = \Yii::$app->image->versions;
        if (isset($versions[$version])) {
            $thumb = \Yii::$app->image->createVersion($id, $version);
            $this->getImage($thumb);
            // die;
            //   return $this->render('_image', ['thumb' => $thumb]);
        } else
            throw new \yii\web\HttpException(404, Img::t('error', 'Failed to create image! Version is unknown.'));
    }

    public function getImage($imagePath) {

        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $contentType = finfo_file($fileInfo, $imagePath);
        finfo_close($fileInfo);

        $fp = fopen($imagePath, 'r');

        header("Content-Type: " . $contentType);
        header("Content-Length: " . filesize($imagePath));

        ob_end_clean();
        fpassthru($fp);
        exit;
    }

    public function actionUploadPics() {
        $pics = Array(5);
        $images = Array();
        $session = \Yii::$app->session;
        $lgid = $session['cid'];
        //echo $lgid; die;
        //var_dump($lgid); die;			  
        if (!empty($lgid)) {
            $sql = "SELECT
                        id                        
                        FROM tbl_image
                        where name = '$lgid' ";

            $count = 0;
            $images = Image::model()->findAllBySql($sql);
        }
        // if(!empty($images))
        foreach ($images as $img) {    //var_dump($img->id); 
            //  echo $img->filename;
            $pics[$img->id] = $img->filename;
            // $pics[$k]['name'] = $img->filename;
            // echo $k;
        }
        $this->render('/default/_adPics', array('lgid' => $lgid, 'pics' => $pics));
    }

    public function actionRemoveImage() {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        //$arr = CJSON::decode($str);
        //$id =  $arr['id'];//Yii::app()->end();
        if (\Yii::$app->image->delete($id))
            echo 'removed';
        else {
            echo 'not removed';
            die;
        }
    }

    public function actionUploadPhoto() {
          $session = \Yii::$app->session;
        $imid = $session['cid'];
        $img = UploadedFile::getInstanceByName('file');

        //$aptah = 'photos/'.$imid;                    
        // $lgid = Yii::app()->session['Wizard.form']; 
        // $img = Image::model()->findByAttributes(array('name'=>$lgid));
        // !empty($imid)? $imid = $img->id : 0;

        $savedImage = \Yii::$app->image->save($img, $imid, '', '');
        \Yii::debug('here');
        !empty($savedImage) ? $mid = $savedImage->id : '';

        $mid = $savedImage->id;
        $this->images[] = $imid;
        $session = \Yii::$app->session;
        $session['images'] = $this->images;
        //   if($isNew)    
        //   echo $mid;				    
        //   else 
        if (!empty($mid))
        //echo Yii::app()->baseUrl.'/image/default/create/id/'.$mid.'/version/small';
            echo $mid;
        else
            echo 'removed';
    }

}
