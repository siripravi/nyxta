<?php

namespace backend\modules\image;

/**
 * image module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\image\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
        \Yii::setAlias('@foo', '@backend/files/images');
        // custom initialization code goes here
    }
      public function registerTranslations()
    {
        \Yii::$app->i18n->translations['modules/image/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@backend/modules/image/messages',
           
            'fileMap' => [
                'modules/image/app' => 'app.php',
                'modules/image/error' => 'error.php',
            ],
            
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/image/' . $category, $message, $params, $language);
    }
}
