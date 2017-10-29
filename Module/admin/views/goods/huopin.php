

<form action="<?php echo \yii\helpers\Url::to(['goods/goodsnumber']) ?>" method="post">
<table class="table">
    <caption> 基本的表格布局 </caption>
    <thead>
    <tr>
        <?php  foreach ($data as $k=>$v):?>
        <th> <?php echo $k;?> </th>
        <?php  endforeach;?>
    </tr>
    </thead>
    <tbody>

        <tr>
            <?php  $count=count($data);
            foreach ($data as $k=>$v):
            ?>
            <td>
                <select name="goods_attr_id[]">
                    <option value="">请选择</option>
                    <?php foreach ($v as $k1=>$v1): ?>
                        <option value="<?php echo $v1['attr_list_id'] ?>"><?php echo $v1['attr_value'] ?></option>
                <?php endforeach; ?>
                </select>

            </td>

            <?php endforeach; ?>

            <td><input type="text" name="goods_number[]"></td>
            <td><input  onclick="addnewtr(this);" type="button" value="+"></td>
        </tr>

    <tr id="submit">
           <td align="center" colspan="1"><input type="submit" value="提交"></td>
    </tr>

    </tbody>

</table>

</form>


<script type="text/javascript">

    function  addnewtr(btn) {
        var tr=$(btn).parent().parent();
        if ($(btn).val()=="+")
        {
            var newTr=tr.clone();
            newTr.find(":button").val("-");
            $("#submit").before(newTr);
        }else{
            tr.remove();
        }
    }
</script>