<?php
require_once('database.php');

$category_id= filter_input(INPUT_POST,'category_id',FILTER_VALIDATE_INT);
if ($category_id== NULL || $category_id== FALSE) {
    $category_id= filter_input(INPUT_GET,'category_id',FILTER_VALIDATE_INT);
}

$queryAll= 'SELECT* FROM categories ORDER BY categoryID';
$statementAll= $db->prepare($queryAll);
$statementAll->execute();
$categories= $statementAll->fetchAll();
$statementAll->closeCursor();

if (($category_id== NULL || $category_id== FALSE) && !empty($categories)) {
    $category_id= $categories[0]['categoryID'];
}

$query= 'SELECT* FROM categories WHERE categoryID= :category_id';
$statement= $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->execute();
$category= $statement->fetch();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Update Category</h1>
        <form action="update_category.php" method="post" id="add_category_form">
            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $cat) : ?>
                <option value="<?php echo $cat['categoryID']; ?>" <?php if ($cat['categoryID'] == $category_id) echo 'selected'; ?>>
                    <?php echo $cat['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>New Name:</label>
            <input type="text" name="name"
                   value="<?php echo isset($category['categoryName']) ? $category['categoryName'] : ''; ?>"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Update Category"><br>
        </form>
        <p><a href="category_list.php">List Categories</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>
