<?php 
require_once 'DataHandler.php';
require_once "utilities/htmlElements.php";

class Logic {
    public function __construct() {
        $this->DataHandler = new DataHandler( "localhost", "mysql", "stardunk", "root", "");
        $this->htmlElements = new htmlElements();
    }

    public function __destruct() {
    }

    public function createProduct($product_id, $product_type_code, $supplier_id, $product_name, $product_price, $other_product_details)
    {
        try {
            $sql = "INSERT INTO products(`product_id`,`product_type_code`,`supplier_id`,`product_name`,`product_price`, `other_product_details`)VALUES('$product_id','$product_type_code', '$supplier_id', '$product_name', '$product_price','$other_product_details');";
            echo "test1";
            $result = $this->DataHandler->createData($sql);
            echo "test2";
            return $result;
        }catch (Exception $e){
            throw $e;
        }
    }

    public function readProductsPagination(){
        $item_per_page = 4;
        $position = (($_REQUEST['p'] - 1) * $item_per_page);
        $sql = "SELECT * FROM Products LIMIT $position, $item_per_page";
        $pagination = $this->DataHandler->readsData($sql);


        $res = $this->DataHandler->readsData($sql);
        $results = $this->htmlElements->createTable($res);
        $pages = $this->DataHandler->countPages('SELECT COUNT(*) FROM Products');
        return array($pages, $results);
    }

    public function readProducts(){
        $item_per_page = 4;
        $position = ((1-1) * $item_per_page);
        $sql = "SELECT * FROM products LIMIT $position, $item_per_page";
        $res = $this->DataHandler->readsData($sql);
        $results = $this->htmlElements->createTable($res);
        $pages = $this->DataHandler->countPages('SELECT COUNT(*) FROM products');
        return array($pages, $results);
    }

    public function searchBar($input){
        try {
            $sql = "SELECT * FROM products WHERE product_name LIKE '%". $input ."%'";
            $result = $this->DataHandler->searchBar($sql);
            return $result;
        }catch (Exception $e) {
            throw $e;
        }
    }

}
?>