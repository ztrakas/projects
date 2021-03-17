
          
          <?php
          include('db.php');
             if(!empty($_POST)){
                 $start = $_POST['start-date'];
                 $end = $_POST['end-date'];
                 $startDate=intval(str_replace("/","",$start));
                 $endDate = intval(str_replace("/","",$end));
                 $pplCount = $_POST['adults'] + $_POST['children'];
                 $error_start = empty($startDate) ? 1 : 2;
                 $error_end = empty($endDate) ? 1 : 2;
                 if($error_start === 2 && $error_end === 2){
                     if($pplCount > 3){
                         $pplCount = 6;
                        }
                        $allRoom = $conn -> query("SELECT * FROM rooms WHERE beds = $pplCount");
                        $roomArr=[];
                        while($Rooms=$allRoom->fetch_assoc()){
                            
                            
                            
                            $reservations = $conn -> query("SELECT * FROM reservations WHERE room_id = $Rooms[id]");
                            $rev= 1;
                            if($reservations){
                                
                                while($reservation = $reservations -> fetch_assoc()){
                                    
                                    $reservationDates = explode('-', $reservation['date']);
                                    $reserv_start=intval(str_replace("/","",$reservationDates[0]));
                                    $reserv_end=intval(str_replace("/","",$reservationDates[1]));
                                    
                                    
                                    
                                    
                                    if(!($startDate >= $reserv_end) && !($endDate <= $reserv_start)){
                                        $rev=0;
                                        break;
                                    }
                                    
                                    
                                    
                                }
                            }
                            
                            if($rev === 1){
                                array_push($roomArr,$Rooms['id']);
                            }           
                        }
        echo"<div class = 'checkRooms'><div class='content'>";
       if(!empty($roomArr)){
           echo"<h2>Laisvi Kambariai</h2>";
           foreach($roomArr as $room){
            $all = $conn -> query("SELECT * FROM rooms WHERE id = $room");
            $info = $all -> fetch_assoc();

?>

<div class="roombox content">
<div class="roomboxone">
    <img src="img\alexandra-gorn-JIUjvqe2ZHg-unsplash.png" alt="">
    <span><?php echo $info['name'];?></span>
</div>
<div class="roomboxsecond"> 
    <div class="price">&euro; <?php echo $info['price'];?>/ <span>naktis</span></div>
<a href="reservation.php?room=<?php echo $info['id'] . "&range=" . $start . "-" . $end;?>">
<div class="btn buy">Rezervuoti</div>
</a>
</div>

</div>




<?php

           }
       } else{echo"<h2>Laisvu kambarių nėra<h2>";}        
   
    echo'<a href="index.php" class="close"><span class="iconify" data-icon="gg:close" data-inline="false"></span></a></div></div>';
    
    }else{}
                
             }else{
                $error_start = 2;
                $error_end = 2 ;  
             }
             ?>

   
            <form action="index.php" method="post">
                <div class="booking-form">
                    <div class="form-block">
                        <label for="start-date">Atvykimo data</label>
                        <input type="text" id="start-date" name="start-date" class="<?php echo $error_start === 1 ? 'error' : ' '; ?>" readonly>
                    </div>
                    <div class="form-block">
                        <label for="end-date">Isvykimo data</label>
                        <input type="text" name="end-date" id="end-date" class="<?php echo $error_end === 1 ? 'error' : ' '; ?>" readonly>
                    </div>
                    <div class="form-block">
                        <label for="adults">Suaugusieji</label>
                        <select name="adults" id="adults">
                           
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                    
                        </select>
                    </div>
                    <div class="form-block">
                        <label for="children">Suaugusieji</label>
                        <select name="children" id="children">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        
                        </select>
                    </div>
                    <button type="submit" class="btn rooms" style="margin:0;"><span>Tikrinri kambarius</span></button>
                    <div class="calendar displaynone">
                        <div class="message"></div>
                         <div class="year">
                            <div class="back"><span class="iconify" data-icon="eva:arrow-ios-back-fill" data-inline="false"></span></div>
                            <span class="er"></span>
                            <div class="forward"><span class="iconify forward" data-icon="eva:arrow-ios-forward-fill" data-inline="false"></span></div>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Pir</th>
                                    <th>Ant</th>
                                    <th>Tre</th>
                                    <th>Ket</th>
                                    <th>Pen</th>
                                    <th>Šeš</th>
                                    <th>Sek</th>
                                </tr>
                            </thead>
                            <tbody>
        
                            </tbody>
                        </table>
        
        
                     </div>
                    </div>
                </form>
       

