<?php
session_start();
require('../php/Table.php');
require_once('../library/Utils.php');
access2('');
if (isset($_POST["reserver2"])){
    $date = $_POST['date1'];

    $heure1 = $_POST['heure1'];
    $heure2 = $heure1 + 1 ; //On créer l'heure de fin

    //on ajoute à la date l'heure et on crée la date de fin
    $re = "$date-$heure1";
    $re2 = "$date-$heure2";

    $reserv = new Reservation();
    $errors = $reserv->reserver($_POST['for_titre'],$_POST['textarea'], $re,$re2,$heure1,$heure2,$date,$_SESSION['login']);
}

else {
    $errors = array();
}
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
    <title>Formulaire de réservation</title>
</head>
<?php include 'header/header_reservation-form.php'; ?>
<main id="form_main">
    <div id="form_container1">
        <div id="form_titre">
            <h1>Reserver une salle</h1>
        </div>
    </div>
    <?php
    foreach ($errors as $error) {
        echo "<div id='error_ins'>";
        echo "• " . $error . "<br>";
        echo "</div>";

    }
    ?>
    <div id="form_container2">
        <div id="form_cnt2_main">
            <div id="form_cnt2_1">
                <div id="form_cnt2-1_label">
                    <label for="input_titre"><Entrer le titre :</label>
                </div>
                <div id="form_cnt2-1_input">
                    <form method="post">
                        <input type="text" id="input_titre" class="formcolor" name="for_titre" placeholder="Titre:" required="required">
                </div>
            </div>
            <div id="form_cnt2_2">
                <div id="form_cnt2-2_label">
                    <label for="textarea">Entrer une description:</label>
                </div>
                <div id="form_cnt2-2_input">
                    <textarea rows="4" cols="50"  class="formcolor" name="textarea" id="textarea" placeholder="Description:" required="required"></textarea>
                </div>
            </div>
            <div id="form_cnt2_3">
                <div id="form_cnt2-3-1">
                    <div id="form_cnt2-3_label1">
                        <label for="date1">Entrer la date :</label>
                    </div>
                    <div id="form_cnt2-3_input1">
                        <input type="date" id="date1" class="formcolor" max="2022-12-31" min="2021-01-01" name="date1" required="required">
                    </div>
                    <div id="form_cnt2-3-2">
                        <div id="form_cnt2-3_label2">
                            <label for="date2">Crénaux horaire :</label>
                        </div>
                        <div id="form_cnt2-3_input2">
                            <select class="formcolor" id="heure1" size="1" name="heure1" required="required">
                                <option>Heure</option>
                                <option value="9">9h à 10h</option>
                                <option value="10">10h à 11h</option>
                                <option value="11">11h à 12h</option>
                                <option value="12">12h à 13h</option>
                                <option value="13">13h à 14h</option>
                                <option value="14">14h à 15h</option>
                                <option value="15">15h à 16h</option>
                                <option value="16">16h à 17h</option>
                                <option value="17">17h à 18h</option>
                                <option value="18">18h à 19h</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="form_cnt2_4">
                    <div id="form_cnt2_4_button">
                        <input type="submit" id="reserver2" name="reserver2" value="Reserver la salle">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'footer/footer_reservation-form.php'?>
</body>
</html>