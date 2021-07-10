<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estore_article".
 *
 * @property int $id
 * @property int|null $product_id
 * @property string $name
 * @property string|null $sku
 * @property int|null $qty_available
 */
class EstoreArticle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estore_article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'qty_available'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string'],
            [['sku'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'name' => 'Name',
            'sku' => 'Sku',
            'qty_available' => 'Qty Available',
        ];
    }
}
