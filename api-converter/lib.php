<?php 



const URL = 'http://data.fixer.io/api/latest?access_key=';
function welcome(){
    print "<h1>Welcome!</h1>";
}

function getFixerData(){
    global $config;
    $response = file_get_contents(URL.$config['KEY']);
    $data = json_decode($response, true);    
    return $data;
}

function saveData($data){
    $today= date('Y-m-d', $data['timestamp']);
    $ser = serialize($data);
    file_put_contents("database/$today.txt",$ser);
}

function loadData(){
    $today= date('Y-m-d');
    if(file_exists("database/$today.txt")){
        $ser = file_get_contents("database/$today.txt");
        $data = unserialize($ser);
    } else {
        $data=null;
    }
    return $data; 
}

?>