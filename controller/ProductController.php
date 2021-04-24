<?php

class ProductController {
    public $products = 
    [
        'standard' => [
            'products' => [
                1 => 'book',
                2 => 'music CD',
                3 => 'chocolate bar',
                4 => 'bottle of perfume',
                5 => 'packet of headcache pills',
            ]]
    ];

    public $options;
    public $basic_tax_percentage = 10;
    public $imported_tax_percentage = 5;
    public $products_exception = ['book', 'chocolate bar', 'packet of headcache pills'];
    public $receipt;
    
    public function create_options(){
        ob_start();
        foreach ($this->products['standard']['products'] as $key => $value) {
          ?>
          <option value="<?=$value?>"><?=ucfirst($value)?></option>
          <?php
        }
        
        $options = ob_get_contents();
        ob_end_clean();
        $this->options = $options;
    }

    public function receipt_generate(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $sale_taxes= 0;
            $total = 0;
            $i = 1;
            $tr_1 = "";
            

            while($i <= 4) { 
                
                if(!empty($_POST["quantity_$i"]) && !empty($_POST["price_$i"])){
                    $_POST["is_imported_$i"] == true ? $is_imported = true : $is_imported = false; 
                    $product_cost = $_POST["quantity_$i"] * $_POST["price_$i"];
                    
                    switch ($is_imported) {
                        case TRUE:
                             if( in_array($_POST["product_$i"], $this->products_exception) ){
                                 $taxes = ($product_cost * 5) / 100;
                            }else{
                                $taxes = ($product_cost * ( 10 + 5 )) / 100;
                             }
                            break;
                        
                        default:
                            if( in_array($_POST["product_$i"], $this->products_exception) ){
                                $taxes = 0;
                            }else{
                                $taxes = ($product_cost * ( 10 )) / 100;
                            }
                         break;
                    }

                   $product_cost = number_format((float)$product_cost, 2, '.', '') + number_format((float)$taxes, 2, '.', '');
                   $tr_1 .=
                    "<tr>
                        <td> {$_POST["quantity_$i"]} </td>
                        <td> {$_POST["product_$i"] }  </td>
                        <td> EUR $product_cost </td>
                    </tr>";
                 

                    $total += $product_cost;
                    $sale_taxes += $taxes;
                }
                
                $i++;

            }

            $tr_2=
                    "<tr>
                        <td style='font-weight:bold' class='text-danger'> EUR $sale_taxes </td>
                        <td style='font-weight:bold'> EUR  $total </td>
                    </tr>";
            ?> 
            
            <?php 
            ob_start();
            ?>
                <!-- Table products  -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Quantity </th>
                            <th> Product </th>
                            <th> Price </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $tr_1 ?? '' ?>
                    </tbody>
                </table>

                <!-- Table taxes and import  -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Sale taxes </th>
                            <th> Total </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?= $tr_2 ?? '' ?>
                    </tbody>
                </table>
           <?php
           $this->receipt = ob_get_contents();
           ob_end_clean();
        }
    }


}
