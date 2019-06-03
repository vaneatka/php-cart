<?php 
session_start();

include 'config.php';
include 'lib.php';
welcome();

// firstly read local data
$data = loadData();
if(!$data){
$data= getFixerData();
saveData($data);
};

?>
<form>
    <table border = "1">
    <?php foreach($config['currencies'] as $curr){?>
        <tr>
            <td><input type="radio" name="currency" value="<?php print $curr?>"></td>
            <td><?php print $curr?></td>
            <td><?php printf("%05.2f",$data['rates'][$curr])?></td>
        </tr>    
    <?php }?>
        <tr >
        <td colspan="3">
        <input type="text" name = "amount">
        <button>Convert </button>        
        </td>
        </tr>
    </table>

</form>

<script>console.log(<?php print json_encode($data['rates']) ?>)</script>

// sa se afiseze undeva calculul CONVERT   HW