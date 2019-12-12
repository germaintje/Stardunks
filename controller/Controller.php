<?php
//require de logic waar je de functie iets laat doen
require_once './model/Logic.php';
require_once 'utilities/htmlElements.php';

//maak class controller 
class Controller{

    //maak public funtie construct
    public function __construct() {
        $this->Logic = new Logic();
        $this->htmlElements = new htmlElements();
    }

    //maak public functie destruct
    public function __destruct() {
    }

    //maak public funtie handleRequest hierin zorg je dat je ?op=... kan gebruiken
    public function handleRequest() {
        try {
            $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
            //switch case met alle cases die in ondernoemde functies verder gaan
            switch ($op) {
                case 'create':
                    if ($_POST['product_id'] == null) {
                        include 'view/create.php';
                    } else {
                        $this->collectCreate($_POST['product_id'], $_POST['product_type_code'], $_POST['supplier_id'], $_POST['product_name'], $_POST['product_price'], $_POST['other_product_details']);
                    }
                break;
                case 'reads':
                    if($_REQUEST['p'] == NULL) {
                        $this->collectReadProducts();
                    } else {
                        $pagination = "";
                        $products = $this->Logic->readProductsPagination();
                        include 'view/home.php';
                        while ($data = $pagination->fetch(PDO::FETCH_ASSOC)) {
                        //var_dump($data);
                            echo $data['product_name'];
                        }
                    }
                    $pages = $this->DataHandler->countPages('SELECT COUNT(*) FROM products');
                    break;
                case 'searchBar':
                    $this->collectSearchProducts($_REQUEST['input']);
                break;

                default:
                $this->collectReadProducts();
            }
        } catch ( ValidationException $e ) {
            $errors = $e->getErrors();
        }
    }

    //default pagina
    public function collectHome(){
        //$reads = $this->Logic->Reads();
        
        //de view die iets laat zien
        include 'view/home.php';
    }


    //nieuwe public functie met je case $this->...($_REQUEST);
    public function collectCreate($product_id, $product_type_code, $supplier_id, $product_name, $product_price, $other_product_details)
    {
        $products = $this->Logic->createProduct($product_id, $product_type_code, $supplier_id, $product_name, $product_price, $other_product_details);
        include 'view/create.php';
    }

    public function collectReadProducts()
    {
        $products = $this->Logic->readProducts();
        include 'view/home.php';
    }

    public function collectSearchProducts($input)
    {   
        $searchOutput = "";
        $searchOutput = $this->Logic->searchBar($input);    
        $result = $this->htmlElements->createTable($searchOutput);  
       
        include 'view/search.php';
    }

}
?>