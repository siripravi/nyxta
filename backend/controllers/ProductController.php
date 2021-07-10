<?php

namespace backend\controllers;

use Yii;
use common\models\Product;
use common\models\ProductSearch;
use common\models\ProductVariation;
use common\models\ProductVariationAttribute;
use yii\base\Model;
use yii\helpers\Url;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

use abcms\library\base\AdminController;
use yii\data\ActiveDataProvider;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends AdminController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update', 'create', 'delete','cat-images','delete-variation'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $variationId = null)
    {
        $model = $this->findModel($id);
        // variatios related code
        $variationDataProvider = new ActiveDataProvider([
            'query' => ProductVariation::find()->andWhere(['productId'=>$model->id]),
        ]);
        $variation = null;
        if($variationId) { // Load existing
            $variation = ProductVariation::findOne($variationId);
        }
        if(!$variation){
            $variation = new ProductVariation();
            $variation->loadDefaultValues();
        }
        
        $attributes = [];
        $postCount = count(Yii::$app->request->post('ProductVariationAttribute', []));
        if($postCount){
            for($i = 0; $i < $postCount; $i++) {
                $attributes[] = new ProductVariationAttribute();
            }
        }
        else{
            $attributes = $variation->productVariationAttributes 
                    ? $variation->productVariationAttributes
                    : [new ProductVariationAttribute()];   
        }
        
        $variationFormFocused = false;
        
        if($variation->load(Yii::$app->request->post()) && Model::loadMultiple($attributes, Yii::$app->request->post())) { // Load, validate and save form
            $variation->productId = $model->id;
            $valid = $variation->validate();
            $valid = Model::validateMultiple($attributes) && $valid;
            if($valid){
                if($variation->save(false)){
                    ProductVariationAttribute::deleteAll(['variationId'=>$variation->id]);
                    foreach($attributes as $attribute){
                        $attribute->variationId = $variation->id;
                        $attribute->save(false);
                    }
                    Yii::$app->session->setFlash('message', 'Data saved successfully.');
                    return $this->redirect(Url::current(['variationId' => null]));
                }
            }
            else{
                $variationFormFocused = true;
            }
        } 
        if($variationId){
            $variationFormFocused = true;
        }
        
   
        return $this->render('view', [
            'model' => $model,
            'variationDataProvider' => $variationDataProvider,
            'variation' => $variation,
            'attributes' => $attributes,
            'variationFormFocused' => $variationFormFocused,

        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $model->automaticTranslationSaving = true;
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->automaticTranslationSaving = true;
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionCatImages($cid) {
         //$cid = !empty($_GET['cid'])? $_GET['cid']:1;
         //echo $cid; die;
        $session = \Yii::$app->session;
        $session['cid'] = $cid;
        return $this->render('images', ['cid' => $cid]);
    }
    
    /**
     * Finds the ProductVariation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductVariation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findVariationModel($id)
    {
        if (($model = ProductVariation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Deletes an existing ProductVariation model.
     * If deletion is successful, the browser will be redirected to the product detail page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteVariation($id)
    {
        $model = $this->findVariationModel($id);
        $productId = $model->productId;
        $model->delete();
        Yii::$app->session->setFlash('message', 'Variation deleted successfully.');
        return $this->redirect(['view', 'id'=>$productId]);
    }


}
