<div class="col-xl-12 main">
    <div class="row">
        <div class="col-xl-6">
            <div class="top-block">Добавление продукта</div>
        </div>
        <div class="col-xl-6">
            <div class="right-block">
                <input type="submit" value="Сохранить" class="add_product">
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row_main">
    <div class="success" style="display:none;">Спасибо, продукт успешно добавлен!</div>
    <div class="error" style="display:none;">Произошла непредвиденная ошибка, попробуете еще раз!</div>
    <form class="form-add-product">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-4 add-top">
                    <div>
                        <label>SCU</label><input class="form_model" type="text" name="scu"><div class="error-scu"></div>
                    </div>
                    <div>
                        <label>Название</label><input class="form_model" type="text" name="name"><div class="error-name"></div>
                    </div>
                    <div>
                        <label>Цена</label><input class="form_model" type="text" name="price"><div class="error-price"></div>
                    </div>
                    <div class="select-add">
                        <label>Тип</label>
                        <div class="error-type_product"></div>
                        <select class="select-add-product" name="type_product">
                            <option value="0">Выберите тип</option>
                            <?foreach($params['type_products'] as $k_product_id => $product_value){?>
                                <option value="<?=$k_product_id?>"><?=$product_value?></option>
                            <?}?>
<!--                            <option value="2">Книга</option>-->
<!--                            <option value="3">Мебель</option>-->
                        </select>
                        <div class="error-value"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="add-select-result">
            <?foreach($params['products_options_type'] as $k_product_id => $product_array){?>
            <div class="item-add" style="display: none;" data-id="<?=$k_product_id?>">
                <?foreach($product_array as $k_type => $value_type){?>
                    <label><?=$value_type?></label>
                    <input class="form_model" type="text" name="products_options_type[<?=$k_product_id?>][<?=$k_type?>]">
                    <div>Краткое описание для DVD</div>
                <?}?>
            </div>
            <?}?>
<!--            <div class="item-add" style="display: none;" data-id="2">-->
<!--                <label>Вес (в кг)</label>-->
<!--                <input type="text" name="type2">-->
<!--                <div>Краткое описание для книги</div>-->
<!--            </div>-->
<!--            <div class="item-add" style="display: none;" data-id="3">-->
<!--                <label>Размеры (HxWxL) </label>-->
<!--                <input type="text" name="type3">-->
<!--                <div>Краткое описание для мебели</div>-->
<!--            </div>-->
        </div>
    </form>
</div>