<?php
class productsGateway{
    function getTypeId()
    {
        if (isset($_GET['typeId'])) {
            return $_GET['typeId'];
        } else {
            echo "No typeId provided";
        }
    }

    function getProductsByTypeId()
    {
        $db = new PDO('mysql:host=localhost;dbname=ss16-bbb2-fst-1;charset=utf8', 'root', '');
        $query = "SELECT t.name AS productTypeName, p.name AS prodcutName
        FROM product_types t
        JOIN products p ON t.id = p.id_product_types
        WHERE t.id =:productTypeId";

        $statement = $db->prepare($query);
        $productTypeID = $this->getTypeId();
        $statement->bindParam(':productTypeId', $productTypeID);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $addURL = $this->buildListTypeURL();

        $listedProductsByTypeId = array();
        foreach($results as $listedItem){
            array_push($listedProductsByTypeId, $listedItem);
            array_push($listedProductsByTypeId, $addURL);
        }
        return $listedProductsByTypeId;
    }
    function buildListTypeURL(){
        $typeURL = "http://localhost/BEB_Webshop/HAINDL_STUPPACHER_BE_Uebung3/product_kataloger/katalogIndex.php?action=listTypes";
        return $typeURL;
    }
}