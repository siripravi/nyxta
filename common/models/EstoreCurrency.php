<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estore_currency".
 *
 * @property int $id
 * @property int|null $is_base
 * @property string $name
 * @property float $value
 */
class EstoreCurrency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estore_currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_base'], 'integer'],
            [['name', 'value'], 'required'],
            [['value'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_base' => 'Is Base',
            'name' => 'Name',
            'value' => 'Value',
        ];
    }
}
