<?php
namespace common\models;

use Yii;
use common\base\BaseModel;
use common\models\User;

/**
 * Login form
 */
class RegisterForm extends BaseModel
{
    public $username;
    public $password;
    public $password1;
    public $email;
    public $status=1;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password','password1','email',], 'required'],
            ['username', 'userNameMustUnique'],
            ['email','email'],
            ['email','emailMustUnique'],
            ['password1','passwordEqual'],
        ];
    }

    public function emailMustUnique($attribute, $params)
    {
        if ($this->hasErrors()) {
            return false;
        }
        $user = User::findOne(['email' => $this->email]);
        if($user){
            $this->addError($attribute, '邮箱已存在!');
        }
    }

    public function userNameMustUnique($attribute, $params)
    {
        if ($this->hasErrors()) {
            return false;
        }
        $user = User::findOne(['username' => $this->username]);
        if($user){
            $this->addError($attribute, '用户名已存在!');
        }
    }

    public function passwordEqual($attribute, $params)
    {
        if ($this->hasErrors()) {
            return false;
        }

        if($this->password != $this->password1)
            $this->addError($attribute, '密码输入不一致!');
    }

    public function save()
    {
        $user = new User();
        $user->setAttributes($this->toArray());
        return $user->userSave();
    }

}
