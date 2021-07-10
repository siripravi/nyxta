<?php

namespace backend\controllers;

use Yii;
use common\models\EstoreArticlePrice;
use common\models\EstoreArticlePriceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstoreArticlePriceController implements the CRUD actions for EstoreArticlePrice model.
 */
class EstoreArticlePriceController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EstoreArticlePrice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstoreArticlePriceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EstoreArticlePrice model.
     * @param integer $article_id
     * @param integer $currency_id
     * @param integer $qty
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($article_id, $currency_id, $qty)
    {
        return $this->render('view', [
            'model' => $this->findModel($article_id, $currency_id, $qty),
        ]);
    }

    /**
     * Creates a new EstoreArticlePrice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EstoreArticlePrice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'article_id' => $model->article_id, 'currency_id' => $model->currency_id, 'qty' => $model->qty]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EstoreArticlePrice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $article_id
     * @param integer $currency_id
     * @param integer $qty
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($article_id, $currency_id, $qty)
    {
        $model = $this->findModel($article_id, $currency_id, $qty);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'article_id' => $model->article_id, 'currency_id' => $model->currency_id, 'qty' => $model->qty]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EstoreArticlePrice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $article_id
     * @param integer $currency_id
     * @param integer $qty
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($article_id, $currency_id, $qty)
    {
        $this->findModel($article_id, $currency_id, $qty)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EstoreArticlePrice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $article_id
     * @param integer $currency_id
     * @param integer $qty
     * @return EstoreArticlePrice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($article_id, $currency_id, $qty)
    {
        if (($model = EstoreArticlePrice::findOne(['article_id' => $article_id, 'currency_id' => $currency_id, 'qty' => $qty])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
