(function($){
    $(function(){
        //添加到购物车
        if(!!$(".btn_add_to_cart")[0]){
            btn_add_to_cart();
        }

    });

    function btn_add_to_cart()
    {
        $(".btn_add_to_cart").click(function(e){
            e.preventDefault();
            var url = $(this).attr("href");
            var data = {
                goodsid:parseInt($(this).attr("data-id")),
                quantity:1
            };
            $.post(url,data,function(da){
                var result = da["result"];
                if(result==1){
                    alert("添加成功！");
                }else if(result==101){//未登陆
                    alert("请先登陆");
                    location.href = "/site/login";
                }else if(result==0){
                    alert("数据添加失败");
                }else if(result==102){
                    alert(da.msg);
                }
            },"json");
        });
    }
})(jQuery);