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
                        <label>SCU</label><input type="text" name="scu"><div class="error-scu"></div>
                    </div>
                    <div>
                        <label>Название</label><input type="text" name="name"><div class="error-name"></div>
                    </div>
                    <div>
                        <label>Цена</label><input type="text" name="price"><div class="error-price"></div>
                    </div>
                    <div class="select-add">
                        <label>Тип</label>
                        <select class="select-add-product" name="type">
                            <option value="0">Выберите тип</option>
                            <option value="1">DVD диск</option>
                            <option value="2">Книга</option>
                            <option value="3">Мебель</option>
                        </select>
                        <div class="error-type"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="add-select-result">
            <div class="item-add" style="display: none;" data-id="1">
                <label>Размер (в МБ)</label>
                <input type="text" name="type1">
                <div>Краткое описание для DVD</div>
            </div>
            <div class="item-add" style="display: none;" data-id="2">
                <label>Вес (в кг)</label>
                <input type="text" name="type2">
                <div>Краткое описание для книги</div>
            </div>
            <div class="item-add" style="display: none;" data-id="3">
                <label>Размеры (HxWxL) </label>
                <input type="text" name="type3">
                <div>Краткое описание для мебели</div>
            </div>
        </div>
    </form>
</div>