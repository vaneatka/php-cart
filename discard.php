<?php 
session_start();
$pid = $_GET['pid'];

// var_dump(value_arr());
header("location: index.php");


if(in_array($pid, value_arr()) && $_SESSION['cart'][index()]['count']==1 ){
    array_slice($_SESSION['cart'][index()], 1);
} else {
    var_dump($_SESSION['cart'][index()]['count']);
    // var_dump($to_sess['id'], value_arr(), $index);
}

function index(){
    array_search($pid, value_arr());

} 



function value_arr(){
    $values =[];
    foreach($_SESSION['cart'] as $key=>$product){
        array_push($values, $_SESSION['cart'][$key]['id']);
    }
    return $values;
}
?>