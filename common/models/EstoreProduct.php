<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estore_product".
 *
 * @property int $id
 * @property string $name
 * @property int $producer_id
 */
class EstoreProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estore_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'producer_id'], 'required'],
            [['name'], 'string'],
            [['producer_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'producer_id' => 'Producer ID',
        ];
    }
}
