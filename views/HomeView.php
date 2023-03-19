<?php
require_once('controllers/ProductController.php');
$productController = new ProductController();
$productsArrr = array();
$productsArrr = $productController->getAllProducts();

// for ($i = 0; $i < count($productsArrr) - 1; $i++) {
//     var_dump($productsArrr[$i]['productName']);
// }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    foreach ($productsArrr as $product) {
        echo "<p>{$product['productName']}</p>";
        echo "<p>{$product['price']}</p>";
    }
    ?>
</body>


</html>