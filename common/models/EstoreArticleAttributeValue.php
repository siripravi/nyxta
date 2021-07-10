<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estore_article_attribute_value".
 *
 * @property int $article_id
 * @property int $set_id
 * @property int $attribute_id
 * @property string|null $value
 */
class EstoreArticleAttributeValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estore_article_attribute_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'set_id', 'attribute_id'], 'required'],
            [['article_id', 'set_id', 'attribute_id'], 'integer'],
            [['value'], 'string'],
            [['article_id', 'set_id', 'attribute_id'], 'unique', 'targetAttribute' => ['article_id', 'set_id', 'attribute_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'article_id' => 'Article ID',
            'set_id' => 'Set ID',
            'attribute_id' => 'Attribute ID',
            'value' => 'Value',
        ];
    }
}
