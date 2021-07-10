<?php
namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $descrition
 * @property string $category_image_link
 *
 * @property Category $parent
 * @property Category[] $categories
 * @property Product[] $products
 */
class Category extends \abcms\library\base\BackendActiveRecord
{
	/*public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }*/
    
     /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            TimestampBehavior::className(),
            [
                'class' => \abcms\multilanguage\behaviors\ModelBehavior::className(),
                'attributes' => [
                    'name',
                    'description:text-editor',
                ],
            ],
          /*  [
                'class' => \abcms\structure\behaviors\CustomFieldsBehavior::className(),
            ],  */
            [
                'class' => \abcms\library\behaviors\SeoBehavior::className(),
                'route' => '/shop/category',
                'titleAttribute' => 'name',
            ],
        ]);
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30],
            [['description',], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
	
	public function getCategImgPath()
	{
		return Yii::getAlias('@frontend/web/images/categories/' . md5($this->id . $this->name) . '.jpg');
	}
	
	public function getCategImgUrl()
	{
		return Yii::getAlias('@frontendWebroot/images/categories/' . md5($this->id . $this->name) . '.jpg');
	}
	
	public function afterDelete()
	{
		unlink($this->getCategImgPath());
		parent::afterDelete();
	}
        
        /**
     * Return categories list array, to be used in drop down lists.
     * @return array
     */
    public static function getCategoriesList()
    {
        $query = Category::find()->orderBy('name ASC');
        $models = $query->all();
        return ArrayHelper::map($models, 'id', 'name');
    }
    
    /**
     * Get categories models with children, used in frontend.
     * @return Category[]
     */
    public static function getFrontendCategories(){
        $query = self::find();
        $query->andWhere(['parent_id' => null, 'active'=>1])->orderBy(['ordering'=>SORT_ASC, 'name'=>SORT_ASC]);
        $query->with(['children']);
        $models = $query->all();
        return $models;
    }
    
    /**
     * Get parent category name
     * @return string|null
     */
    public function getParentName()
    {
        return $this->parent ? $this->parent->name : null;
    }

    
   /**
     * Return parents list array, to be used in drop down lists.
     * @return array
     */
    public static function getParentsList($excludeId = null)
    {
        $query = self::find()->andWhere(['parent_id' => null])->orderBy('name ASC');
        if($excludeId) {
            $query->andWhere(['not in', 'id', $excludeId]);
        }
        $models = $query->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

}
