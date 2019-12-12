<?php
// hoofdpagina met includes van de create formulier en gegevens tabel
?>
<?php include 'header.php';?>

        <h1><a style="text-decoration: none; color: black;" href="index.php">Read Products</a></h1>
        <form action="?op=searchBar" method="post">
        <div class="col-4" style="display: flex;">
            <input class="form-control zoekbalk" type="text" name="input" placeholder="search">
            <button class="zoek" type="submit" value="verstuur"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <nav>
            <a href="index.php?op=create">
                <button class="btn btn-primary createnew" style="float: right;"><i class="fas fa-plus"></i> Create New Product</button>
            </a>
        </nav>
        <?php
        

        echo $products[1];
        //echo $result;

        
        $html = '';
        for ($i = 1; $i < $products[0]; $i++) {
            $html .= "<a href='?op=reads&p=$i'> " . $i . "</a>";
        }
        $html .= "<a href='?op=reads&p=$i'> >></a>";
        echo $html;
        ?>



<?php include 'footer.php'; ?>