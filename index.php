<style>
body{
    margin:50px;
}
div{
    clear:both;
    border: 1px solid #8BB;
    padding: 20px;
    overflow:hidden;
    margin:5px;
}
img{
    float:left;
}

</style>
<hr>
<a href="?curr=MDL">MDL</a>
<a href="?curr=USD">USD</a>
<a href="?curr=EUR">EUR</a>
<hr>
<?php require 'cart.php' ?>



<?php 

    $selected_currency = $_GET["curr"] ?? "MDL";


    $content = file_get_contents("./database/products.json");
    $products = json_decode($content , true);
    $content = file_get_contents("./database/currencies.json");
    $currencies = json_decode($content , true);
    // var_dump($currencies);
    ///////////////PREPROCESS(currencies)/////////////////////

    foreach($products as &$product){
        $value=$product["price"]["value"];
        $curr = $product["price"]["currency"];

        $new_price = $value * $currencies[$curr][$selected_currency];
        // var_dump($new_price);

        $product["price"]["currency"] = $selected_currency;
        $product["price"]["value"] = $new_price;
    }

    ////////////////////////////////////
?>

<hr/>


<?php foreach($products as &$product){ ?>
    <div>
    <img src="<?php print $product["photo"] ?> " alt="photo">
    <h2> <?php print $product["name"] ?>   <small><?php print $product["price"]["value"]." ".$product["price"]["currency"] ?>  </small> </h2>
    <a href="add.php?pid=<?php print $product["id"]?>">++++</a>
</div>
<?php   } ?>
