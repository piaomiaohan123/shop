
    <table class="table">
        <caption> 基本的表格布局 </caption>
        <thead>
        <tr>
        </tr>
        </thead>
        <tbody>

        <tr>

                <td>
                        <option value="">请选择</option>
                        <?php foreach ($data as $k1=>$v1): ?>
                            <?php echo $v1->attr_list.'---'.$v1->price.'<br/>'; ?>

                        <?php endforeach; ?>

                </td>





        </tr>

        </tbody>

    </table>

