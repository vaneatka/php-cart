<?php 
session_start();
$pid = $_GET['pid'];

$val_arr = value_arr();


if(in_array($pid, $val_arr) && $_SESSION['cart'][array_search($pid, $val_arr)]['count']==1 ){   
    array_splice($_SESSION['cart'], array_search($pid, $val_arr),1);
} else if(in_array($pid, $val_arr) && $_SESSION['cart'][array_search($pid, $val_arr)]['count']>1 ) {
    $_SESSION['cart'][array_search($pid, $val_arr)]['count']--;
    // var_dump($to_sess['id'], value_arr(), $index);
}


function value_arr(){
    $values =[];
    foreach($_SESSION['cart'] as $key=>$product){
        array_push($values, $_SESSION['cart'][$key]['id']);
    }
    return $values;
};


// var_dump($pid, $val_arr );
header("location: index.php");

?>