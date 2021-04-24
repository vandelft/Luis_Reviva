<?php 
require 'controller/ProductController.php';
$productController = new ProductController();
$productController->receipt_generate();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Fill out your receipt!</title>
  </head>
  <body>
    
    <div class="container p-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Receipt</h1>
            </div>
            <div class="col-4 mx-auto">
                <?= $productController->receipt ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>
