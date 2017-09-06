Yii2 Settings
=============
Simple Yii2 settings extension

[![Latest Stable Version](https://poser.pugx.org/yii2mod/yii2-settings/v/stable)](https://packagist.org/packages/yii2mod/yii2-settings) [![Total Downloads](https://poser.pugx.org/yii2mod/yii2-settings/downloads)](https://packagist.org/packages/yii2mod/yii2-settings) [![License](https://poser.pugx.org/yii2mod/yii2-settings/license)](https://packagist.org/packages/yii2mod/yii2-settings)
[![Build Status](https://travis-ci.org/yii2mod/yii2-settings.svg?branch=master)](https://travis-ci.org/yii2mod/yii2-settings)

Installation   
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yii2mod/yii2-settings "*"
```

or add

```json
"yii2mod/yii2-settings": "*"
```

to the require section of your composer.json.

Configuration
-------------

**Database Migrations**

Before usage this extension, we'll also need to prepare the database.

```
php yii migrate --migrationPath=@vendor/yii2mod/yii2-settings/migrations
```

**Module Setup**

To access the module, you need to configure the modules array in your application configuration:
```php
'admin' => [
    'modules' => [
        'settings' => [
            'class' => 'yii2mod\settings\Module',
            // Also you can override some controller properties in following way:
            'controllerMap' => [
                'default' => [
                    'class' => 'yii2mod\settings\controllers\DefaultController',
                    'searchClass' => [
                        'class' => 'yii2mod\settings\models\search\SettingSearch',
                        'pageSize' => 25
                    ],
                    'modelClass' => 'Your own model class',
                    'indexView' => 'custom path to index view file',
                    'createView' => 'custom path to create view file',
                    'updateView' => 'custom path to update view file',
                ]
            ]
        ],
    ],
]
```    
> You can then access settings page by the following URL:
http://localhost/path/to/index.php?r=admin/settings/

**Component Setup**

To use the Setting Component, you need to configure the components array in your application configuration:
```php
'components' => [
    'settings' => [
        'class' => 'yii2mod\settings\components\Settings',
    ],
]
```
    
Usage:
---------
```php
$settings = Yii::$app->settings;

$value = $settings->get('section', 'key');

$settings->set('section', 'key', 125.5);

$settings->set('section', 'key', 'false', SettingType::BOOLEAN_TYPE);

// Checking existence of setting
$settings->has('section', 'key');

// Activates a setting
$settings->activate('section', 'key');

// Deactivates a setting
$settings->deactivate('section', 'key');

// Removes a setting
$settings->remove('section', 'key');

// Removes all settings
$settings->removeAll();

$settings->invalidateCache(); // automatically called on set(), remove();  
```

Manage custom settings
----------------------

You can use your own form model to manage custom settings for your web application via `SettingsAction`. 
To use the `SettingsAction` class you need to follow the following steps:

1) Create your own model, for example:

```php
<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;

class ConfigurationForm extends Model
{
    /**
     * @var string application name
     */
    public $appName;

    /**
     * @var string admin email
     */
    public $adminEmail;

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['appName', 'adminEmail'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'appName' => Yii::t('app', 'Application Name'),
            'adminEmail' => Yii::t('app', 'Admin Email'),
        ];
    }
}
```

2) Create view file, named `settings.php` with the following content:

```php
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model \app\models\forms\ConfigurationForm */
/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Manage Application Settings');
?>
<?php $form = ActiveForm::begin(); ?>

<?php echo $form->field($model, 'appName'); ?>

<?php echo $form->field($model, 'adminEmail'); ?>

<?php echo Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end(); ?>

```

3) Add settings action to your controller class as follows:

```php
<?php

namespace app\controllers;

use yii\web\Controller;

/**
 * Class SiteController
 *
 * @package app\controllers
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'manage-settings' => [
                'class' => \yii2mod\settings\actions\SettingsAction::class,
                // also you can use events as follows:
                'on beforeSave' => function ($event) {
                    // your custom code
                },
                'on afterSave' => function ($event) {
                    // your custom code
                },
                'modelClass' => \app\models\forms\ConfigurationForm::class,
            ],
        ];
    }
}
```

*Now you can access to the settings page by the following URL: http://localhost/path/to/index.php?r=site/manage-settings/*
                       


Internationalization
----------------------

All text and messages introduced in this extension are translatable under category 'yii2mod.settings'.
You may use translations provided within this extension, using following application configuration:

```php
return [
    'components' => [
        'i18n' => [
            'translations' => [
                'yii2mod.settings' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/settings/messages',
                ],
                // ...
            ],
        ],
        // ...
    ],
    // ...
];
```




