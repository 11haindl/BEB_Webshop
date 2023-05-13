<?php
class productTypeGateway{
    function addProductsToProductType($product){
        //array_push($this->products, $product);
    }

    function getProductTypesFromDatabase()
    {
        $db = new PDO('mysql:host=localhost;dbname=ss16-bbb2-fst-1;charset=utf8', 'root', '');
        $query = "SELECT id, name FROM product_types ORDER BY name";

        $statement = $db->prepare($query);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);     
        if (count($results) > 0) {
            $productTypes = $this->pushItemsIntoArray($results);
        }

        echo json_encode($productTypes);
        return $productTypes;
    }

    function pushItemsIntoArray($results){
        $productTypes = array();
        foreach ($results as $result) {
            $productType = new productType();
            $productType->id = $result['id'];
            $productType->name = $result['name'];
            array_push($productTypes, $productType);
        }
        return $productTypes;
    }
}