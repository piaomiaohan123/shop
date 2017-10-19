function addToCart(goods_id) {
    number=$("#number").val();

  $.post(
      'index.php?r=goods/addcart',
      {"number":number,"goods_id":goods_id},
      function (data) {
          if(data.error){
              alert(data.msg);
          }

      },'JSON'
  );

}