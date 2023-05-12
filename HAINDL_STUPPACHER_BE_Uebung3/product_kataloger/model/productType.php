<?php

class productType
{
    private $id;
    private $name;
    private $products;

    function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
        $this->products = array();
    }

    function addProductsToProductType($product){
        array_push($this->products, $product);
    }
}