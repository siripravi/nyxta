<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estore_set_attribute".
 *
 * @property int $id
 * @property int|null $type
 * @property string $input
 * @property string $name
 * @property string|null $values
 * @property int|null $is_i18n
 */
class EstoreSetAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estore_set_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'is_i18n'], 'integer'],
            [['input', 'name'], 'required'],
            [['values'], 'string'],
            [['input', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'input' => 'Input',
            'name' => 'Name',
            'values' => 'Values',
            'is_i18n' => 'Is I18n',
        ];
    }
}
