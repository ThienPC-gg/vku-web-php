<?php
$category_id= filter_input(INPUT_POST,'category_id',FILTER_VALIDATE_INT);
$name= filter_input(INPUT_POST,'name');

if ($category_id== null || $category_id== false || $name== null) {
    $error= "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    $query= 'UPDATE categories
              SET categoryName= :name
              WHERE categoryID= :category_id';
    $statement= $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();

    include('category_list.php');
}
?>
