<?php 
require 'controller/ProductController.php';
$productController = new ProductController();
$productController->create_options();
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
        <div class="row" >
          <div class="col-12 text-center">
            <h3>Fill out your receipt!</h3>
          </div>
          
          <div class="col-7 mx-auto text-center">
            <div class="card card-body">
              <form action="./receipt.php" method="POST">
              <div class="row" style="align-items:baseline">
                    <div class="col-12">
                      <p for="products_1">Please list your products</p>
                      <p class="small">Please leave empty fields on "Q." if you reached the products</p>
                      <hr>
                    </div>

                      <div class="col-4 mt-3">
                        <select name="product_1" id="products_1" class="form-control">
                         <?=$productController->options?>
                        </select>
                      </div>
                      <div class="col-2 mt-3">
                        <input type="number" name="quantity_1" class="form-control" placeholder="Q.">
                      </div>
                      <div class="col-2 mt-3">
                        <input type="number" name="price_1" class="form-control" step="any" placeholder="EUR" >
                      </div>
                      <div class="col-4 mt-3">
                        <div class="form-check form-switch my-auto">
                            <input class="form-check-input" type="checkbox" name="is_imported_1" value="1" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Is it imported?</label>
                        </div>
                      </div>
                      
                      <div class="col-4 mt-3">
                        <select name="product_2" id="products_2" class="form-control">
                         <?=$productController->options?>
                        </select>
                      </div>
                      <div class="col-2 mt-3">
                        <input type="number" name="quantity_2" class="form-control" placeholder="Q.">
                      </div>
                      <div class="col-2 mt-3">
                        <input type="number" name="price_2" class="form-control" placeholder="EUR"  step="any">
                      </div>
                      <div class="col-4 mt-3">
                        <div class="form-check form-switch my-auto">
                            <input class="form-check-input" type="checkbox" name="is_imported_2" value="1" id="flexSwitchCheckDefault2">
                            <label class="form-check-label" for="flexSwitchCheckDefault2">Is it imported?</label>
                        </div>
                      </div>
                      
                      
                      <div class="col-4 mt-3">
                        <select name="product_3" id="products_1" class="form-control">
                         <?=$productController->options?>
                        </select>
                      </div>
                      <div class="col-2 mt-3">
                        <input type="number" name="quantity_3" class="form-control" placeholder="Q.">
                      </div>
                      <div class="col-2 mt-3">
                        <input type="number" name="price_3" class="form-control" placeholder="EUR"  step="any">
                      </div>
                      <div class="col-4 mt-3">
                        <div class="form-check form-switch my-auto">
                            <input class="form-check-input" type="checkbox" name="is_imported_3" value="1" id="flexSwitchCheckDefault3">
                            <label class="form-check-label" for="flexSwitchCheckDefault3">Is it imported?</label>
                        </div>
                      </div>


                      <div class="col-4 mt-3">
                        <select name="product_4" id="products_4" class="form-control">
                         <?=$productController->options?>
                        </select>
                      </div>
                      <div class="col-2 mt-3">
                        <input type="number" name="quantity_4" class="form-control" placeholder="Q.">
                      </div>
                      <div class="col-2 mt-3">
                        <input type="number" name="price_4" class="form-control" placeholder="EUR" step="any" >
                      </div>
                      <div class="col-4 mt-3">
                        <div class="form-check form-switch my-auto">
                            <input class="form-check-input" type="checkbox" name="is_imported_4" value="1" id="flexSwitchCheckDefault3">
                            <label class="form-check-label" for="flexSwitchCheckDefault3">Is it imported?</label>
                        </div>
                      </div>
                      

                      
                    </div>
                    <input type="submit" value="Print receipt" class="btn btn-warning mt-3">
                  </form>
                  </div>
                 
              </div>


        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>