
<?php
if(!empty($_GET['room'])){
    require_once('db.php');
    $room = $_GET['room'];

$roomItems=$conn-> query("SELECT * FROM rooms WHERE id = $room");
$arr=[];
while($roomItem=$roomItems->fetch_assoc()){
$arr =  $roomItem;
}


?>
 <?php echo json_encode($arr); ?> 

    
              
                
    <?php 
}else{
    echo"Kambario nera";
}
    
    ?>
