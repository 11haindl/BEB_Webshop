<?php

class katalogService
{
    public function initUI()
    {
        if ($_GET['input']) {
        }
    }

    function getProductTypesFromDatabase()
    {
        $db = new PDO('mysql:host=localhost;dbname=ss16-bbb2-fst-1;charset=utf8', 'root', '');
        $query = "SELECT id, name FROM product_types ORDER BY name";

        $statement = $db->prepare($query);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $productTypes = array();
        if(count($results) > 0){
            foreach($results as $result){
                $productType = new productType($result['id'], $result['name']);
                array_push($productTypes, $productType);
            }
        }

        print_r($productTypes);
    }
}
