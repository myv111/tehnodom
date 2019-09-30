<div class="col-xl-12 main">
    <div class="row">
        <div class="col-xl-6">
            <div class="top-block">Продукты</div>
        </div>
        <div class="col-xl-6">
            <div class="right-block">
                <select class="select_options">
                    <option>Выберите действие</option>
                    <option value="1">Удалить</option>
                    <option value="2">Добавить</option>
                </select>
                <input type="submit" value="Применить" class="select_submit">
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row_main">
    <?$i = 0;foreach($params as $row){?>
        <?if($i == 0){?>
        <div class="col-xl-12">
            <div class="row">
        <?}elseif($i % 4 == 0){?>
        <div class="col-xl-12">
            <div class="row">
        <?}?>
                <div class="col-xl-3 main-block id<?=$row['id'];?>">
                    <div class="block">
                        <div class="block-checkbox">
                            <input type="checkbox" value="<?=$row['id'];?>">
                        </div>
                        <div class="one-block">
                            <div><?=$model->type_products[$row['type_product']];?></div>
                            <div><?=$row['scu'];?></div>
                            <div><?=$row['name'];?></div>
                            <div><?=$row['price'];?></div>
                            <div><?=$model->types[$row['type_product']];?>: <?=$row['type'];?></div>
                        </div>
                    </div>
                </div>
        <?if($i != 0 && $i + 1 % 4 == 0){?>
            </div>
        </div>
        <?}?>
    <?$i++;}?>
        </div>
    </div>
</div>