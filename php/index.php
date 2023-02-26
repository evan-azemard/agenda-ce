<?php
session_start();
include('User.php');
require_once('../library/Utils.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="https://use.fontawesome.com/d3028f0b61.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/reservationsalles.css">
    <link rel="shortcut icon" href="https://th.bing.com/th/id/OIP.W-ukJI6sI6FTEyYw1i5TVAHaLG?w=137&h=205&c=7&o=5&pid=1.7"/>
    <link rel="preconnect">
    <meta name="description" content="Reserver votre salle en ligne !" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <title>Menu</title>
</head>
<body id="index_body">
<?php include "header/header_index.php";?>
<main id="index_main">
    <div id="index_main_center">
        <div class="index_main_container-principaux">
            <div class="index_main_principaux_titre">
                <h1>Bienvenue sur tartanpion</h1>
            </div>
            <div id="index_main_container-img1">
                <div id="index_img1_images-1">
                </div>
                <div id="index_img1_images-2">
                </div>
                <div id="index_img1_images-3">
                </div>
            </div>
        </div>
        <div class="index_main_container-principaux">
            <div id="index_main_principaux_titre1">
                <div id="index_main_titre1">
                    <p>Nos salles ont était construite par l'architecte reconnu Rem Koolhaas </p>
                </div>
            </div>
        </div>
        <div class="index_main_container-principaux">
            <div class="index_main_principaux_titre">
                <p>Nos plus belles salles</p>
            </div>
            <div id="index_main_container-img2">
                <div class="index_img2_contient">
                    <div class="index_img2_titre">
                        <p>salle Jullien Doré</p>
                    </div>
                    <div class="index_img4">
                        <img src="../img/img4.jpg">
                    </div>
                </div>
                <div class="index_img2_contient">
                    <div class="index_img2_titre">
                        <p>salle Arthur Bilo</p>
                    </div>
                    <div class="index_img4">
                        <img src="../img/img5.jpg">
                    </div>
                </div>
            </div>
        </div>
        <div class="index_main_container-principaux">
            <div class="index_main_principaux_titre">
                <p>Reserver dès maintenant !</p>
            </div>
            <div id="index_main_button">
                <div id="index_main_fake_button">
                    <button id="index_button"><a href="reservation-form.php"> Réserver ! </a></button>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include "footer/footer_index.php";?>
</body>
</html>

