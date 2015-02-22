<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "{{%shopping_cart}}".
 *
 * @property integer $id
 * @property string $username
 * @property integer $goodsid
 * @property integer $quantity
 * @property integer $created_at
 * @property integer $updated_at
 */
class ShoppingCart extends \common\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shopping_cart}}';
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
            [['username', 'goodsid', ], 'required'],
            [['goodsid', 'quantity', ], 'integer'],
            [['username'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'goodsid' => '商品ID',
            'quantity' => '数量',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
