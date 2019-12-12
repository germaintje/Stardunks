<?php include 'header.php'; ?>

<form action="?op=create" method="POST">
    <h3>Maak nieuw product</h3>
        <div class="form-group">
            <label for="id">id</label>
            <input type="text" name="product_id" class="form-control" placeholder="naam">
        </div>

        <div class="form-group">
            <label for="id">product_type_id</label>
            <input type="text" name="product_type_code" class="form-control" placeholder="naam">
        </div>

        <div class="form-group">
            <label for="id">supplier_id</label>
            <input type="text" name="supplier_id" class="form-control" placeholder="naam">
        </div>

        <div class="form-group">
            <label for="id">product_name</label>
            <input type="text" name="product_name" class="form-control" placeholder="naam">
        </div>

        <div class="form-group">
            <label for="id">product_price</label>
            <input type="int" name="product_price" class="form-control" placeholder="naam">
        </div>

        <div class="form-group">
            <label for="id">other_product_details</label>
            <input type="text" name="other_product_details" class="form-control" placeholder="naam">
        </div>

        <button type="submit" name="submit">submit</button>
</form>

<a href="index.php">Terug</a>