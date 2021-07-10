<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%project_description}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $language
 * @property string $content
 */
class ProductDescription extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_description}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'content'], 'required'],
            [['product_id'], 'integer'],
            [['content'], 'string'],
            [['language'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('project', 'ID'),
            'product_id' => Yii::t('project', 'Product ID'),
            'language' => Yii::t('product', 'Language'),
            'content' => Yii::t('product', 'Content'),
        ];
    }
}
