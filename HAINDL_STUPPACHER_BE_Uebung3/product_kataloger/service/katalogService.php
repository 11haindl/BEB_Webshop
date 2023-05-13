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
                $productTypeGateway = new productTypeGateway();
                $productTypeGateway->getProductTypesFromDatabase();
                break;
            case "listProductsByTypeId":
                $productsGateway = new productsGateway();
                $productsGateway->getProductsByTypeId();
                break;
            default:
                echo "action is not valid";
        }
    }

    

    
}
