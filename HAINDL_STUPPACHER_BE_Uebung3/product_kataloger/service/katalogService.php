<?php

class katalogService
{
    function getData()
    {
        if (isset($_GET['action'])) {
            $this->route($_GET['action']);
        } else {
            echo "No action provided";
        }
    }

    function route($action)
    {
        switch ($action) {
            case "listTypes":
                $this->getProductTypesFromDatabase();
                break;
            case "listProductsByTypeId":
                echo "Produkte";
                break;
            default:
                echo "action is not valid";
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
        if (count($results) > 0) {
            foreach ($results as $result) {
                $productType = new productType($result['id'], $result['name']);
                array_push($productTypes, $productType);
            }
        }

        print_r($productTypes);
        return $productTypes;
    }
}
