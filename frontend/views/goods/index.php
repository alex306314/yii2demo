<?php
use yii\helpers\Url;
?>
<?php if($itemid==0){ ?>
<div class="goodlist">
    <ul class="goodsul">
        <?php foreach($goods as $k=>$v){ ?>
        <li>
            <a href="<?php echo Url::to('@web/goods').'/'. $v['id']; ?>" class="imgwa">
                <img src="http://gi4.mlist.alicdn.com/bao/uploaded/i8/TB1vrb.HXXXXXa3XpXXdLOL9FXX_043759.jpg_b.jpg" alt=""/>
            </a>
            <a class="gname" href=""><?php echo $v['name'] ?></a>
            <span class="price">￥<?php echo $v['price'] ?></span>
        </li>
        <?php } ?>
    </ul>
</div>
<?php }else{ ?>
    <div class="imgw">
        <img src="http://gi4.mlist.alicdn.com/bao/uploaded/i8/TB1vrb.HXXXXXa3XpXXdLOL9FXX_043759.jpg_b.jpg" alt=""/>

    </div>
    <div class="name"><?php echo $g->name; ?></div>
    <div class="price">$<?php echo $g->price; ?></div>
    <a class="btn btn-primary" href="">立即购买</a>
    <a class="btn btn-danger btn_add_to_cart"
       data-id="<?php echo $itemid; ?>"
       href="<?php echo Url::to('@web/cart/add'); ?>">加入购物车</a>
<?php } ?>
