
<?php 
$galleryIMGscan = scandir('img/gallery',1);
$galleryIMG = array_diff($galleryIMGscan, array('.', '..'));
$count = 0;
$IMGcount = count($galleryIMG);
$i = 1;

?>


            <h2>Galerija</h2>
            <div class="gallery">
                <?php

                    foreach ($galleryIMG as $IMG) {
                   

    $query = "SELECT * FROM gallery_imgs WHERE url = '$IMG'";
    $result = mysqli_query($conn,$query);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
       
      } else {
       $sql= "INSERT INTO gallery_imgs (id, url, content) VALUES (NULL, '$IMG', 'Lorem ipsum dolor sit amet consectetur.')";
        mysqli_query($conn,$sql);
       
      }
    } else {
      echo 'Error: '.mysqli_error();
    }
    $result = mysqli_query($conn,$query);
$content = mysqli_fetch_assoc($result);

if($i === 1 ){
    echo"<div class = 'gallery-row'>"; 
}
if($i != $IMGcount){
if($i % 5 === 0){
    echo"</div><div class = 'gallery-row'>";
 }}
 

   

                            echo'<div class="gallery-img">';
                            echo'<img src="img/gallery/' . $IMG . '" class="fluid" alt="">';
                            echo'</div>';
                            echo'<div class="gallery-img-view displaynone">';
                            echo'<div class = "img-background">';
                            echo'<img src="img/gallery/' . $IMG . '" class="fluid" alt="">';
                            echo'<div class="foto-forward"><span class="iconify" data-icon="eva:arrow-ios-forward-outline" data-inline="false"></span></div>
                            <div class="foto-back"><span class="iconify" data-icon="eva:arrow-ios-back-outline" data-inline="false"></span></div>
                            <div class="foto-close"><span class="iconify" data-icon="gg:close" data-inline="false"></span></div>';
                            
                            echo"<p>" . $content['content'] . "<br><span>Nuotrauka " . ++$count . " is " . $IMGcount . "</span></p>";
                            
                            echo'</div>';
                            echo'</div>';
                            if($i === $IMGcount){echo"</div>";}
                            $i++;
                    }


                ?>
           
            </div>
