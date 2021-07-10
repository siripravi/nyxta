<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estore_group".
 *
 * @property int $id
 * @property int|null $parent_group_id
 * @property int|null $cover_image_id
 * @property string|null $images_list
 * @property string $name
 * @property string|null $teaser
 * @property string|null $text
 */
class EstoreGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estore_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_group_id', 'cover_image_id'], 'integer'],
            [['images_list', 'name', 'teaser', 'text'], 'string'],
            [['name'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_group_id' => 'Parent Group ID',
            'cover_image_id' => 'Cover Image ID',
            'images_list' => 'Images List',
            'name' => 'Name',
            'teaser' => 'Teaser',
            'text' => 'Text',
        ];
    }
}
