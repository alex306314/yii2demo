<?php
namespace frontend\controllers;

use common\models\ShoppingCart;
use frontend\base\BaseFrontController;
use common\models\Goods;
use common\models\User;
use Yii;

class CartController extends BaseFrontController
{
    /**
     * 购物车清单
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            $this->redirect("/site/login");
        }
        $cart = (new \yii\db\Query())
            ->select(["c.id","c.username", "c.goodsid","c.quantity","g.name","g.price"])
            ->from("{{%shopping_cart}} c")
            ->leftJoin("{{%goods}} g", "c.goodsid=g.id")
            ->orderBy("c.created_at desc")
            ->offset(0)
            ->limit(10)
            ->all();
        $total = 0;
        $ids = [];
        foreach($cart as $k=>$v){
            $total += $v['price'] * $v['quantity'];
            $ids[] = $v['id'];
        }
        $ids = implode("-",$ids);
        $this->data['total'] = $total;
        $this->data['carts'] = $cart;
        $this->data['ids'] = $ids;
        return $this->render("index",$this->data);
    }

    public function actionDelete()
    {
        $itemid = isset($_GET['itemid'])?$_GET['itemid']:0;
        $sc = ShoppingCart::findOne(['id'=>$itemid]);
        if($sc){
            $sc->delete();
        }
        $this->redirect("/cart");
    }

    /**
     * 添加商品到购物车
     */
    public function actionAdd()
    {
        if(Yii::$app->user->isGuest){
            echo json_encode([
                "result" => 101,
                'msg' => "请先登陆!",
            ]);exit;
        }
        $goodsid = $_POST['goodsid'];
        $quantity = $_POST['quantity'];
        $user = User::findOne(['id'=>Yii::$app->user->getId()]);

        //查找购物车是否已有同款产品
        if(ShoppingCart::findOne(['username'=>$user->username, 'goodsid'=>$goodsid])){
            $data = [ "result" => 102,"msg" => "商品已存在"];
            echo json_encode($data);exit;
        }

        $shoppingCart = new ShoppingCart();
        $shoppingCart->setAttributes([
            'username' => $user->username,
            'goodsid' => $goodsid,
            'quantity' => $quantity,
        ]);
        $id = $shoppingCart->save();
//        if(!$id){
//            var_dump($shoppingCart->getErrors());
//        }
        $data = [
            "result" => $id?1:0,
            "msg" => [
                'goodsid' => $goodsid,
                'quantity' => $quantity,
            ]
        ];
        echo json_encode($data);exit;
    }

    

}