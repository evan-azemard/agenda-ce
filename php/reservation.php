<?php
if(isset($_GET["evenement"]) && !empty($_GET["evenement"])) {
    $id = $_GET["evenement"];
    require_once('../library/Database.php');
    $dbco = connectPdo();
    $requete= $dbco->prepare("SELECT * FROM reservations INNER JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE reservations.id = '$id'");
    $requete->execute();
    $resa = $requete->fetchAll();

    $titre = $resa[0]['titre'];
    $login = $resa[0]['login'];
    $description = $resa[0]['description'];

    $debut = $resa[0]['debut'];
    $fin = $resa[0]['fin'];
}
?>
<?php
session_start();
require_once('../library/Utils.php');
access2('');

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
    <title>Reservation</title>
</head>
<body id="reservation_body">
<?php include 'header/header_reservation.php'?>
<main id="reservation_main">
    <div id="reservation_container_titre">
        <div id="reservation_container_titre_h1">
            <h1>Reservation en cours</h1>
        </div>
    </div>
    <div id="reservation_container_main">
        <div id="reservation_container_main_container1">
            <div id="main_container1_1">
                <div id="main_container1_1_text">
                    <h1 class="marclair">Titre:<br><!--&nbsp;&nbsp;--><?= Htmlspecialchars($titre); ?> </h1>
                </div>
            </div>
            <div id="main_container1_2">
                <div id="main_container1_2_text" class="colorgray">
                    <p>Description:<br><?=Htmlspecialchars($description); ?> </p>
                </div>
            </div>
            <div id="main_container1_3">
                <div id="main_container1_3_text">
                    <p class="marclair">Heure/date de début: <?= Htmlspecialchars($debut) ?></p>
                    <p class="marclair">Heure/date de fin: <?= Htmlspecialchars($fin) ?></p>
                </div>
            </div>
            <div id="main_container1_4">
                <div id="main_container1_4_text">
                    <p class="marclair">Réservation déposé par:<br><?= Htmlspecialchars($login)?></p>
                </div>
            </div>
        </div>
        <div id="reservation_container_main_container2">
            <div id="main_container2_1">
                <div id="main_container2_1_text">
                    <h1 class="marclair">Salle:&nbsp;Jullien Doré</h1>
                </div>
            </div>
            <div id="main_container2_2">
                <div id="main_container1_2_text">
                    <p class="marclair">1er étage</p>
                </div>
            </div>
            <div id="main_container2_3">
                <div id="main_container1_3_text">
                    <p class="marclair">Pour réserver un salle, veuillez cliquer sur le boutton ci-dessous.</p>
                </div>
            </div>
            <div id="main_container2_4">
                <div id="main_container1_4_text">
                    <button id="reserver1">
                        <a href="reservation-form.php">Reserver une salle</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'footer/footer_reservation.php';?>
</body>
</html>