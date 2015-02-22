<?php
use yii\helpers\Url;
?>

<div class="goodlist">
    <div class="title">我的购物车</div>
    <table class="cart table table-hover">
        <tr>
            <td>图片</td>
            <td>商品名称</td>
            <td>单价</td>
            <td>数量</td>
            <td>操作</td>
        </tr>
        <?php foreach($carts as $k=>$v){ ?>
        <tr>
            <td><a href="<?php echo Url::to('goods/'). $v['goodsid']; ?>">
                    <img width="50" height="50" src="http://gi4.mlist.alicdn.com/bao/uploaded/i8/TB1vrb.HXXXXXa3XpXXdLOL9FXX_043759.jpg_b.jpg" alt=""/></a></td>
            <td>
                <a class="name" href="<?php echo Url::to('goods/'). $v['goodsid']; ?>">
                    <?php echo $v['name'] ?>
                </a>
            </td>
            <td>￥<?php echo $v['price'] ?></td>
            <td><?php echo $v['quantity'] ?></td>
            <td><a class="btn btn-sm btn-primary btn_cart_remove"
                   href="<?php echo Url::to("cart/delete"); ?>?itemid=<?php echo $v['id']; ?>">移除</a></td>
        </tr>
        <?php } ?>
    </table>
</div>
<div class="row">  总价: <?php echo $total; ?> 元</div>
<div class="row">
    <a class="btn btn-warning btn_generate_sheet" href="<?php echo Url::to("order/confirm"); ?>?ids=<?php echo $ids; ?>">生成订单</a>
</div>