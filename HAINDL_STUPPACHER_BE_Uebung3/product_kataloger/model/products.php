<?php
 namespace product_kataloger\model\products;
class products
{
    private $productTypeID;
    private $name;

    private $db;



    protected function __construct($name,$productTypeID){
        $this->name = $name;
        $this->productTypeID = $productTypeID;
        $this->db = new PDO('mysql:host=localhost;dbname=ss16-bbb2-fst-1;charset=utf8', 'root', '');

    }
    protected function getProductsByType(){

        $query = "SELECT t.name AS productTypeName, p.name AS prodcutName
        FROM product_types t
        JOIN products p ON t.id = p.id_product_types
        WHERE t.id =:productTypeId";

        $statement=$this->db->prepare($query);

        $statement->bindParam(':productTypeId', $this->productTypeID);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        print_r($results);
    }


}