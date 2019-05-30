<?php
// start session
session_start();

// scriem in session
$pid = $_GET["pid"];

$to_sess = array(
    "id"=> $pid,
    "count"=> 1
);

if(! in_array($to_sess['id'], value_arr())){
    array_push($_SESSION['cart'], $to_sess);
} else {
    $index = array_search($to_sess['id'], value_arr());
    $_SESSION['cart'][$index]['count']++;
    // var_dump($to_sess['id'], value_arr(), $index);
}
    




function value_arr(){
    $values =[];
    foreach($_SESSION['cart'] as $key=>$product){
        array_push($values, $_SESSION['cart'][$key]['id']);
    }
    return $values;
}




header("location: index.php");


?>
