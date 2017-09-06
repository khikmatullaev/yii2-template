<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public $defaultAction = 'setting';

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'setting' => [
                'class' => \yii2mod\settings\actions\SettingsAction::class,
                'modelClass' => \app\modules\admin\models\Setting::class,
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
