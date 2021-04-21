<?php

use classes\DataBase;

DataBase::dbConnect();
$sqlCategory = 'SELECT * FROM category';
$categories = DataBase::sqlQuery($sqlCategory , PDO::FETCH_ASSOC);
?>

<h3>Создание товара</h3>

<form action="" method="POST" id="product">
    <input type="text" name="name" placeholder="Название">
    <input type="number" name="price" placeholder="Цена">
    <input type="text" name="quantity" placeholder="Количество">

    <select name="category_id">
        <option disabled selected>Выбрать категорию</option>
        <?php foreach($categories as $category){?>
        <option value="<?=$category['id'] ?>"><?=$category['name'] ?></option>
        <?php } ?>
    </select>

    <textarea rows="3" cols="60" type="text" name="description" placeholder="Описание"></textarea>
    <button type="submit" name="submitProduct">Создать</button>
</form>

<div id="productResult"></div>

<h3>Создание категории</h3>
<form action="" method="POST" id="category">
    <input type="text" name="name" placeholder="Название">
    <button type="submit" name="submitCategory">Создать</button>
</form>
<div id="categoryResult"></div>

<script>

    let formProduct = document.getElementById('product');
    formProduct.addEventListener('submit', function(
        event) {

        let promise = fetch('../models/createProduct.php', {
            method: 'POST',
            body: new FormData(this),
        });

        promise.then(
            response => {
                return response.text();
            }
        ).then(
            text => {
                productResult.innerHTML = text;
            }
        );

        event.preventDefault();
    });

    let formCategory = document.getElementById('category');
    formCategory.addEventListener('submit', function(
        event) {

        let promise = fetch('../models/createCategory.php', {
            method: 'POST',
            body: new FormData(this),
        });

        promise.then(
            response => {
                return response.text();
            }
        ).then(
            text => {
                categoryResult.innerHTML = text;
            }
        );

        event.preventDefault();
    });

</script>