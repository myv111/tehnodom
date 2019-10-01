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
    <?if(isset($model::$type_products[$v['parent']['type_product']])){?>
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
<!--                                --><?//$products_options_type = \app\models\ProductsOptions::$products_options_type[$v['parent']['type_product']];?>
<!--                                --><?//$string_headers = '';$string_val = '';?>
<!--                                --><?//foreach($v['child'] as $child){?>
<!--                                    --><?//
//                                        if($v['parent']['type_product'] == 3){
//                                            $string_headers  = $model->types[$v['parent']['type_product']];
//                                            $string_val     .= $child['value'].'X';
//                                        }else
//                                            echo $products_options_type[$child['type']].': '.$child['value'].'<br />';
//                                    ?>
<!--                                --><?//}?>
<!--                                --><?//if($string_val) echo $string_headers.': '.$string_val.'<br />'; ?>
                                <?if(isset(\app\models\ProductsOptions::$products_options_type[$v['parent']['type_product']])) { ?>
                                    <?
                                    $products_options_type = \app\models\ProductsOptions::$products_options_type[$v['parent']['type_product']]; ?>
                                    <? ?>
                                    <?
                                    $parent_id = 0;
                                    $inc = 0;
                                    $string_headers = '';
                                    $string_val = '';
                                    foreach ($v['child'] as $child) { ?>
                                        <?
                                        if (!$parent_id || $parent_id != $v['parent']['type_product'])
                                            $inc = 0;
                                        if (isset(\app\models\ProductsOptions::$products_options_type['type'][$v['parent']['type_product']][$inc])) {
                                            $products_options_type_type = \app\models\ProductsOptions::$products_options_type['type'][$v['parent']['type_product']][$inc];
                                            if (in_array($child['type'], $products_options_type_type)) {
                                                $string_headers = $products_options_type_type['name'];
                                                $string_val .= $child['value'] . $products_options_type_type['separator'];
                                            } elseif (!empty($string_val)) {
                                                $string_val = substr($string_val, 0, -1);
                                                echo $string_headers . ': ' . $string_val . '<br />';
                                                $string_val = '';
                                                $inc++;
                                            } elseif (isset($products_options_type[$child['type']]))
                                                echo $products_options_type[$child['type']] . ': ' . $child['value'] . '<br />';
                                        } elseif (isset($products_options_type[$child['type']]))
                                            echo $products_options_type[$child['type']] . ': ' . $child['value'] . '<br />';

                                        $parent_id = $v['parent']['type_product'];
                                        ?>
                                    <?
                                    } ?>
                                    <?
                                    if ($string_val) {
                                        $string_val = substr($string_val, 0, -1);
                                        echo $string_headers . ': ' . $string_val . '<br />';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?if($i != 0 && $i + 1 % 4 == 0){?>
            </div>
        </div>
        <?}?>
    <?$i++;}}?>
        </div>
    </div>
</div>