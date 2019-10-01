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
    <?$i = 0;foreach($params as $k => $v){?>
        <?if($i == 0){?>
        <div class="col-xl-12">
            <div class="row">
        <?}elseif($i % 4 == 0){?>
        <div class="col-xl-12">
            <div class="row">
        <?}?>
                <div class="col-xl-3 main-block id<?=$k;?>">
                    <div class="block">
                        <div class="block-checkbox">
                            <input type="checkbox" value="<?=$k;?>">
                        </div>
                        <div class="one-block">
                            <div><?=$model::$type_products[$v['parent']['type_product']];?></div>
                            <div><?=$v['parent']['scu'];?></div>
                            <div><?=$v['parent']['name'];?></div>
                            <div><?=$v['parent']['price'];?></div>
                            <div>
<!--                                --><?//=$model->types[$v['parent']['type_product']];?><!--:-->
                                <?$products_options_type = \app\models\ProductsOptions::$products_options_type[$v['parent']['type_product']];?>
                                <?foreach($v['child'] as $child){?>
                                    <?
                                        echo $products_options_type[$child['type']].': '.$child['value'].'<br />';
                                    ?>
                                <?}?>
                            </div>
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