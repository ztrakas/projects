
<?php 



$faqItems=$conn-> query("SELECT * FROM faq");
$i = 1;

?>

            <h2>D.U.K.</h2>
            <div class="faq">


            <?php  
            
            while($faqitem = $faqItems -> fetch_assoc()){



?>

            
                <div class="faq-item">
                    <span class="faq-num"><?php echo $i; ?></span>
                    <p> <?php echo $faqitem['title']; ?></p>
                    <div class="toggle">
                        <span class="iconify" data-icon="dashicons:arrow-down-alt2" data-inline="false"></span>
                    </div>
                </div>
                <div class="faq-content">
                    <p>
                    <?php echo $faqitem['text']; ?>
                    </p>
                </div>


    <?php   $i++;     }?>
               
            </div>
            <div class="btn more"><span>daugiau klausimų</span></div>
 