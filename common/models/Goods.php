<?php

namespace common\models;

use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property integer $id
 * @property integer $username
 * @property string $name
 * @property string $price
 * @property integer $cid
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['cid', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['price'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '产品名称',
            'username' => '用户',
            'price' => '价格',
            'cid' => '分类',
            'status' => '状态',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    public function goodsSave()
    {
        $user = User::findOne(['id'=>Yii::$app->user->getId()]);
        $this->username = $user->username;
        return $this->save();
    }
}
