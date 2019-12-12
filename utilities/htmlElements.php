<?php
class htmlElements{
    public function createTable($result){
        $tableheader = false;

        $html = "";
        $html .= "<table class='table'>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if ($tableheader == false) {
                
                $html .= "<tr>";
                $html .= "<th><input type='checkbox' name='product[]' value='" . $row['product_id'] . "'></th>";
                foreach ($row as $key => $value) {
                    $id = $row["product_id"];
                    $html .= "<th>$key</th>";
                }
                $html .= "<th colspan='3'>Actions</th>";
                $html .="</tr>";
                $tableheader = true;
            }
            $html .= "<tr>";
            $html .= "<td><input type='checkbox' name='product[]' value='" . $row['product_id'] . "'></td>";
            foreach ($row as $key => $value) {
                if($key == "product_price"){
                    $html .= "<td>" . "€ " . str_replace('.', ',', $value) . "</td>";
                } else {
                    $html .= "<td>$value</td>";
                }
            }
            $html .= "<td><a href='index.php?op=read&id=" . $row['product_id'] . "'  class=\"fas fa-book-open\" style='color: black;'> Read</a></td>";
            $html .= "<td><a href='index.php?op=update&id=" . $row['product_id'] . "' class=\"far fa-edit\" style='color: black;'> Update</a></td>";
            $html .= "<td><a href='index.php?op=delete&id=" . $row['product_id'] . "' class=\"fas fa-times\" style='color: black;'> Delete</a></td>";
            $html .="</tr>";
        }
        $html .= "</table></div>";

        
        return $html;
    }
}
