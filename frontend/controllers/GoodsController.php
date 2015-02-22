<?php
namespace frontend\controllers;

use frontend\base\BaseFrontController;
use common\models\Goods;

class GoodsController extends BaseFrontController
{
    /**
     * 商品
     * @return string
     */
    public function actionIndex($itemid=0)
    {
        $this->data['itemid'] = $itemid;
        if($itemid==0){ //无商品ID 显示列表页
            $goods = (new \yii\db\Query())
                ->select("*")
                ->from("goods")
                ->offset(0)
                ->limit(10)
                ->all();
            $this->data['goods'] = $goods;
        }else{//显示指定商品详情
            $g = Goods::findOne(['id'=>$itemid]);
            $this->data['g'] = $g;
        }
        return $this->render("index",$this->data);
    }



}