<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estore_product_set_ref".
 *
 * @property int $product_id
 * @property int $set_id
 */
class EstoreProductSetRef extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estore_product_set_ref';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'set_id'], 'required'],
            [['product_id', 'set_id'], 'integer'],
            [['product_id', 'set_id'], 'unique', 'targetAttribute' => ['product_id', 'set_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'set_id' => 'Set ID',
        ];
    }
}
