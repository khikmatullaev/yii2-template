<?php

namespace app\models;

use Yii;

class User extends \dektrium\user\models\User
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->on(self::BEFORE_REGISTER, function() {
            $this->username = $this->email;
        });

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if( $this->isNewRecord )
            $this->username = $this->email;

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        unset($rules['usernameRequired']);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'confirmed_at' => 'Confirmed At',
            'unconfirmed_email' => 'Unconfirmed Email',
            'blocked_at' => 'Blocked At',
            'registration_ip' => 'Registration Ip',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'flags' => 'Flags',
            'last_login_at' => 'Last Login At',
        ];
    }

    /**
     * Assign to the user the role
     *
     * @param   integer  $userId  The user id
     * @param   string   $role    The role should be assigned
     *
     * @return  void
     *
     * @throws
     */
    public static function assignRole($userId, $role)
    {
        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole($role);
        $auth->assign($authorRole, $userId);
    }
}
