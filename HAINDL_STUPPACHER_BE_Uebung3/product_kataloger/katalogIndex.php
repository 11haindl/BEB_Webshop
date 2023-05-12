<?php
echo "Hello World!";
include("config/config.php");

/*$db = new PDO('mysql:host=localhost;dbname=ss16-bbb2-fst-1;charset=utf8', 'root', '');
$query = "SELECT t.name AS productTypeName, p.name AS prodcutName
        FROM product_types t
        JOIN products p ON t.id = p.id_product_types
        WHERE t.id =:productTypeId";

$statement=$db->prepare($query);
$productTypeID = 5;
$statement->bindParam(':productTypeId', $productTypeID);
$statement->execute();

$results = $statement->fetchAll(PDO::FETCH_ASSOC);

print_r($results);
*/

$katalogService = new katalogService();
$katalogService->getData();