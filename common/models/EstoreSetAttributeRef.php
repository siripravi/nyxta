<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estore_set_attribute_ref".
 *
 * @property int $set_id
 * @property int $attribute_id
 */
class EstoreSetAttributeRef extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estore_set_attribute_ref';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['set_id', 'attribute_id'], 'required'],
            [['set_id', 'attribute_id'], 'integer'],
            [['set_id', 'attribute_id'], 'unique', 'targetAttribute' => ['set_id', 'attribute_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'set_id' => 'Set ID',
            'attribute_id' => 'Attribute ID',
        ];
    }
}
