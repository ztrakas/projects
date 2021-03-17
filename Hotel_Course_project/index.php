<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>PALM hotel</title>
</head>

<body>
<?php

include('db.php');

?>
    <header>
       
            <div class="logo">
                <div class="dot"></div>
                <h1>palm</h1>

            </div>
            <form action="#" class="search-form">
                <input type="text" name="paieska" id="search" placeholder="Paieskos tekstas">

            </form>
            <nav>
                <ul>
                    <li><a href="#rooms">Kambariai</a></li>
                    <li><a href="#gallery">Galerija</a></li>
                    <li><a href="#services">Paslaugos</a></li>
                    <li><a href="#">Kontaktai</a></li>
                </ul>
            </nav>
            <div class="center">
                <p>Modernus pasirinkimas Jūsų verslo išvykai</p>
                <p>Aprašymas apie viešbutį, jo teikiamas paslaugas, trumpa informacija ar šūkis.</p>
            </div>
            <?php

include_once('roomcheck.php');

            ?>
       
    </header>
    <div class="content">
        <section id="about">
            <h2>Apie mus</h2>
            <div class="stats">
                <div class="stat">
                    <img src="img/trophy.svg" alt="trophy">
                    <p>Apdovanojimas už nepriekaištingą paslaugų kokybę</p>
                </div>
                <div class="stat">
                    <img src="img/door-open.svg" alt="door">
                    <p>platus kambarių pasirinkimas</p>
                </div>
                <div class="stat">
                    <img src="img/ios-people.svg" alt="trophy">
                    <p>priimame su grupėmis</p>
                </div>
                <div class="stat">
                    <span class="num">12</span>
                    <p>Skirtingų erdvių Jūsų išskirtinėms pramogoms</p>
                </div>
                <div class="stat">
                    <span class="num">1,536</span>
                    <p>Svečių skaičius, kurių sulaukiame kasmet</p>
                </div>
            </div>
        </section>
        <section id="rooms">
            <?php require('rooms.php');?>
        </section>
        <section id="services">
            <h2>Paslaugos</h2>
            <ul class="nav">
                <li class="active">Restoranas</li>

                <li class="">Sporto sale</li>
            </ul>
            <div class="restourant">
                <img src="img/jason-leung-poI7DelFiVA-unsplash@2x.png" class="fluid" alt="">
                <h3>RESTORANAS „saulei leidžiantis"</h3>
                <div class="options">
                    <ul>
                        <li><span class="iconify" data-icon="ic:baseline-restaurant-menu" data-inline="false"></span>Platus patiekalų pasirinkimas</li>
                        <li><span class="iconify" data-icon="ic:round-local-bar" data-inline="false"></span>Baras</li>
                        <li><span class="iconify" data-icon="fa-solid:carrot" data-inline="false"></span>Vegetariški / veganiški patiekalai</li>
                    </ul>
                    <ul>
                        <li><span class="iconify" data-icon="map:food" data-inline="false"></span>Maistas išsinešimui</li>
                        <li><span class="iconify" data-icon="feather:alert-circle" data-inline="false"></span>Specialūs meniu alergiškiems</li>
                        <li><span class="iconify" data-icon="fa-solid:guitar" data-inline="false"></span>Gyvos muzikos vakarai</li>
                    </ul>
                </div>
                <button class="btn more"><span>rodyti daugiau</span></button>
            </div>
            <div class="gym">
                <!-- Uzpildy -->
            </div>
        </section>

        <section id="gallery">
        <?php
        include_once('gallery.php');
        ?>
        </section>
        <section id="reviews">
            <h2>Klientų atsiliepimai</h2>
            <div class="reviews-block">
                <!-- <div class="rev-forward"><span class="iconify" data-icon="eva:arrow-ios-forward-fill" data-inline="false"></span></div>
                <div class="rev-back"><span class="iconify" data-icon="eva:arrow-ios-back-fill" data-inline="false"></span></div> -->
                <div class="reviews">
                    <div class="review">
                        <h3>Nepakartojamas laikas!</h3>
                        <p>
                            Labai patiko šis viešbutis. Personalas labai paslaugus. Maistas puikios kokybės. Kadangi mūsų šeimoje turime asmenų, turinčių alergiją, mums pasiūlė specialų, mūsų poreikius atitinkantį, meniu. Itin didelis dėmesys detalėms. Tikrai sugrįšime dar kartą
                            kitoms atostogoms. Rekomenduoju!
                        </p>
                        <h4>Renata P.</h4>
                        <p>Liepos 26 d., 2019</p>
                    </div>
                    <div class="review">
                        <h3>Puikus viešbutis</h3>
                        <p>
                            Grįšime su šeima dar kartą. Ačiū.
                        </p>
                        <h4>Laurynas A.</h4>
                        <p>Liepos 11 d., 2019</p>
                    </div>
                </div>
                <!-- <div class="rev-count"><span class="active"></span ><span></span><span></span><span></span><span></span></div> -->
            </div>
        </section>
        <section id="howToFind">
            <h2>Kaip mus rasti</h2>
            <div class="how-tofind">
                <div class="how-block">
                    <h3>Mus rasite</h3>
                    <div class="find">
                        <img src="img/sebastian-coman-photography-6CtMdQBhUiE-unsplash.png" alt="">
                        <p><span>Palm Hotel</span><br>Šiaurės pr. 256, Kaunas LT-25478</p>
                    </div>
                </div>
                <div class="how-block">
                    <h3>mus pasieksite</h3>
                    <div class="reach">
                        <ul>
                            <li><span class="iconify" data-icon="fa-solid:bus" data-inline="false"></span>
                                <p><span>Centrinė autobusų stotis</span><br> Valstybės g. 36, Kaunas</p>
                                <h4>greičiausias</h4>
                            </li>
                            <li><span class="iconify" data-icon="ri:plane-fill" data-inline="false"></span>
                                <p><span>Oro uostas „Las palmas“</span><br> Oro srauto g., 226, Kauno r.</p>
                                <h4>patogiausias</h4>
                            </li>
                            <li><span class="iconify" data-icon="fa-solid:train" data-inline="false"></span>
                                <p><span>Traukinių stotis</span><br> Traukinio g., 15 Kauno r.</p>
                                <h4>patogiausias</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </section>
        <section id="nearToUs">
            <h2>Siūlome aplankyti</h2>
            <div class="places">
                <div class="place">
                    <span class="iconify" data-icon="map:zoo" data-inline="false"></span>
                    <h4>
                        Zoologijos sodas

                    </h4>
                </div>
                <div class="place">
                    <span class="iconify" data-icon="map:museum" data-inline="false"></span>
                    <h4>Muziejai</h4>
                </div>
                <div class="place">
                    <span class="iconify" data-icon="fa-solid:shopping-cart" data-inline="false"></span>
                    <h4>Prekybos centrai</h4>
                </div>
                <div class="place">
                    <span class="iconify" data-icon="map:art-gallery" data-inline="false"></span>
                    <h4>Meno galerijos</h4>
                </div>
                <div class="place">
                    <span class="iconify" data-icon="map:park" data-inline="false"></span>
                    <h4>Grilio zonos</h4>
                </div>
                <div class="place">
                    <span class="iconify" data-icon="fa-solid:monument" data-inline="false"></span>
                    <h4>Monumentai</h4>
                </div>
            </div>
            <div class="map">
                <img src="img/mapAsset 2@300x.png" alt="" class="fluid">
            </div>
        </section>
        <section id="FAQ">
           <?php
           include_once('faq.php');
           ?>
        </section>
    </div>
    <footer>
        
            <div class="logo">

                <h1>palm</h1>

            </div>
            <div class="contacts">
                <h3>kontaktai</h3>
                <p>Adresas: Šiaurės pr. 256, Kaunas LT-25478</p>
                <p>Telefonas: +370 678 2599 68
                    <p>El. paštas: info@email.com Ir pan.</p>
            </div>
            <div class="social">
                <h3>
                    mes socialiniuose tinkluose:
                </h3>
                <div class="social"><span class="iconify" data-icon="bx:bxl-facebook-square" data-inline="false"></span>
                    <span class="iconify" data-icon="bx:bxl-instagram" data-inline="false"></span>
                    <span class="iconify" data-icon="bx:bxl-twitter" data-inline="false"></span>
                </div>
                <p>
                    Visos teisės saugomos @ PALM HOTEL, 2020
                </p>
            </div>
       
    </footer>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="j.js"></script>
    <script src="datepick.js"></script>
    <script src="gallery.js"></script>
</body>
<?php $conn->close(); ?>
</html>
