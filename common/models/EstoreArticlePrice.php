<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estore_article_price".
 *
 * @property int $article_id
 * @property int $currency_id
 * @property int $qty
 * @property float $price
 */
class EstoreArticlePrice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estore_article_price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'currency_id', 'qty', 'price'], 'required'],
            [['article_id', 'currency_id', 'qty'], 'integer'],
            [['price'], 'number'],
            [['article_id', 'currency_id', 'qty'], 'unique', 'targetAttribute' => ['article_id', 'currency_id', 'qty']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'article_id' => 'Article ID',
            'currency_id' => 'Currency ID',
            'qty' => 'Qty',
            'price' => 'Price',
        ];
    }
}
