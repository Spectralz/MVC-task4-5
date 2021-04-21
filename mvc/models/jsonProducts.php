<?php

use classes\DataBase;
require_once ('../classes/DataBase.php');
DataBase::dbConnect();

$sql = 'SELECT product.id, product.name , price, c.name as category , description FROM product LEFT JOIN category c on c.id = product.category_id';
$products = DataBase::sqlQuery($sql , PDO::FETCH_ASSOC);
echo json_encode($products);