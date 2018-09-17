<?php

namespace app\models;

use Yii;

class Role extends \dektrium\rbac\models\Assignment
{
    /**
     * Returns the role of the user
     *
     * @param   $userId
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getRole($userId)
    {
        return Assignment::findOne(['user_id' => $userId])->item_name;
    }
}