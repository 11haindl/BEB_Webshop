<?php

class katalogService
{

    function route($action)
    {
        switch ($action) {
            case "listTypes":
                $displayAllTypesProper =  $this->displayListTypes();
                return $displayAllTypesProper;
            case "listProductsByTypeId":
                $productsGateway = new productsGateway();
                $list = $productsGateway->getProductsByTypeId();
                return $list;

            default:
                echo "action is not valid";
        }
    }

    function displayListTypes()
    {
        $productTypeGateway = new productTypeGateway();
        $types = $productTypeGateway->getProductTypesFromDatabase();
        $listOfAllTypes = array();
        foreach ($types as $singularType){
            $typesDTO = new \DTOs\productTypesDTO();
            $typesDTO->productType = $singularType->name;
            $addURLtoDTO = $this->buildURL()."?action=listProductsByTypeId&typeId=".$singularType->id;
            $typesDTO->url = $addURLtoDTO;
            array_push($listOfAllTypes, $typesDTO);
        }
        return $listOfAllTypes;
    }

    function buildURL(){
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";

        $url.= $_SERVER['HTTP_HOST'];


        $url.= $_SERVER['REQUEST_URI'];

        return $url;
    }
}
