<h2>Kambariai</h2>
<ul class = "nav" > <?php
           
            $roomClasses = $conn -> query("SELECT * FROM `classes`");

            while($roomClass = $roomClasses -> fetch_assoc()){
                $rooms =$conn -> query("SELECT * FROM `rooms` WHERE `class` = '$roomClass[name]'");
                
                if($rooms->num_rows === 1){
                    $room =$rooms -> fetch_assoc();
                    $class = ($room['id'] === '1') ? 'active' : ' ';
                    
                    echo"<li onclick='getRoom(" . $room['id'] . ")' class='" . $class . "'>";
                    echo $roomClass['display'];
                    echo'</li>';
                    
                    
                }else{
                    
    echo"<li><span onclick='getRoom(2)'>" . $roomClass['display'] . "</span>";
    echo"<ul class='drop'>";
    while($room = $rooms -> fetch_assoc()){
        echo"<li onclick='getRoom(" . $room['id'] . ")'>";
        echo $room['subclass'];
        echo'</li> ';
    }
    echo"</ul>"; 
    echo"</li>"; 
}}
          
            
            ?>

</ul><br>


<div class = "room" >



                



    </div>


<script>

    function getRoom(id) {
        
  
    let room = new XMLHttpRequest();
    room.open("GET", "room.php?room=" + id, true);
    room.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
         let result = this.response;
         let roomdata = JSON.parse(result);
         
         let perks =  roomdata['perks'].split('|');
         let per = '';
         for(let perk of perks){
per += `<li>${perk}</li>`;
         }
         let roomPlace=document.querySelector('.room');
         roomPlace.innerHTML=`<div class="room-content-second">
        <div class="room-foto">
            <img src="img/alexandra-gorn-JIUjvqe2ZHg-unsplash.png" alt="room-foto" class="display img">
            <img src="img/deborah-cortelazzi-gREquCUXQLI-unsplash@2x.png" alt="room-foto" class="img">
            <img src="img/vinicius-amano-17NCG_wOkMY-unsplash@2x.png" alt="room-foto" class="img">
            <div class="foto-forward"><span class="iconify" data-icon="eva:arrow-ios-forward-outline" data-inline="false"></span></div>
            <div class="foto-back"><span class="iconify" data-icon="eva:arrow-ios-back-outline" data-inline="false"></span></div>
            <div class="foto-count"></div>
        </div>
        <p>
        ${roomdata['about']}
        </p>
        <div class="room-icons">
            <span class="iconify" data-icon="mdi:wifi" data-inline="false"></span>
            <span class="iconify" data-icon="ic:baseline-child-friendly" data-inline="false"></span>
            <span class="iconify" data-icon="fa-coffee" data-inline="false" style="font-size: 2.5rem;"></span>
            <span class="iconify" data-icon="fa-solid:wine-glass-alt" data-inline="false"></span>
            <span class="iconify" data-icon="fa-solid:swatchbook" data-inline="false"></span>
            <br>
            <span class="iconify" data-icon="fa-solid:tv" data-inline="false"></span>
            <span class="iconify" data-icon="ic:round-pets" data-inline="false"></span>
        </div>
    </div>
                <div class="room-content">
                    <h3>  ${roomdata['name']}</h3>
                    <ul>${per}
</ul>
                    
                    <p>
                    ${roomdata['about']}
                    </p>
                    
                    <div class="booking">
                        <div class="price">&euro; ${roomdata['price']} / <span>naktis</span></div>
                        <button class="btn buy">užsakyti kambarį</button>
                    </div>
                </div>`;
       
                let roomGali = document.querySelector('.room-foto');
                let roomIMG = roomGali.getElementsByClassName('img');
                let roomGalForward = roomGali.querySelector('.foto-forward');
                let roomGalBack = roomGali.querySelector('.foto-back');
                let roomGalCount = 0;
                let roomGalBubbles = roomGali.querySelector('.foto-count');
                for (let i = 0; i < roomIMG.length; i++) {
                    roomGalBubbles.innerHTML += "<span></span>";
                }
                let roomGalBubble = roomGalBubbles.querySelectorAll('span');
                roomGalBubble[0].classList.toggle('active');
            
            
            
                roomGalForward.addEventListener('click', () => {
                    roomGalBubble[roomGalCount].classList.toggle('active');
                    roomIMG[roomGalCount].classList.toggle('display');
                    if (roomGalCount + 1 >= roomIMG.length) {
                        roomGalCount = 0;
                        roomIMG[roomGalCount].classList.toggle('display');
                        roomGalBubble[roomGalCount].classList.toggle('active');
                    } else {
                        roomGalBubble[roomGalCount + 1].classList.toggle('active');
                        roomIMG[roomGalCount + 1].classList.toggle('display');
                        roomGalCount++;
                    }
            
            
                });
                roomGalBack.addEventListener('click', () => {
                    roomIMG[roomGalCount].classList.toggle('display');
                    roomGalBubble[roomGalCount].classList.toggle('active');
                    if (roomGalCount === 0) {
                        roomGalCount = roomIMG.length - 1;
                        roomIMG[roomGalCount].classList.toggle('display');
                        roomGalBubble[roomGalCount].classList.toggle('active');
                    } else {
                        roomGalBubble[roomGalCount - 1].classList.toggle('active');
                        roomIMG[roomGalCount - 1].classList.toggle('display');
                        roomGalCount--;
                    }
            
            
                });
            
                };
        }
       
    room.send();
    
  
}

listItems = document.querySelectorAll('#rooms ul.nav  li');
for (let i = 0; i < listItems.length; i++) {
    listItems[i].addEventListener('click', () => {
        for (let j = 0; j < listItems.length; j++) {
            listItems[j].classList.remove('active');
        }

        listItems[i].classList.add('active');
    });
}

window.onload = () => { getRoom(1)};

</script>