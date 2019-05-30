<?php 
// session_start();

$products_in_cart = $_SESSION['cart'] ?? [];

?>


<hr>

<?php if (count($products_in_cart) > 0){ ?>

<h2>Items in cart: <?php print sizeof($products_in_cart) ?>
<a href="clear.php"> X </a>

<?php  }  else { ?>
    <h2>The cart is empty. 
<?php }?>
<hr>
<?php var_dump($products_in_cart) ?>
<hr>