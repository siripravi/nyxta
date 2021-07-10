<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estore_product_group_ref".
 *
 * @property int $group_id
 * @property int $product_id
 */
class EstoreProductGroupRef extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estore_product_group_ref';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'product_id'], 'required'],
            [['group_id', 'product_id'], 'integer'],
            [['group_id', 'product_id'], 'unique', 'targetAttribute' => ['group_id', 'product_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'product_id' => 'Product ID',
        ];
    }
}
