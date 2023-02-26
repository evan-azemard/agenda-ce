<?php
session_start();
require('User.php');
require_once('../library/Utils.php');
access('index.php');

if(isset($_POST["inscription"])){
    $user = new Utilisateurs();
    $errors = $user->register($_POST['login'], $_POST['password'], $_POST['r_password'], $_POST['inscription']);
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Harmattan&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Harmattan:wght@700&display=swap" rel="stylesheet">
    <meta name="description" content="Reserver votre salle en ligne !" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <title>Inscription</title>
</head>
<body id="inscription_body">
<?php include 'header/header_inscription.php';?>
<main id="inscription_main">
    <div id="inscription_main_englobe">
        <form method="post" id="form_inscription">
            <div id="main_englobe_titre_1">
                <div id="main_englobe_titre_1_h1">
                    <h1 class="titrecolor">Inscription</h1>
                </div>
            </div>
            <?php
            foreach ($errors as $error) {
                echo "<div id='error_ins'>";
                echo "• " . $error . "<br>";
                echo "</div>";
            }
            ?>
            <div class="main_englobe_container_g">
                <div class="main_englobe_titre">
                    <label for="login"><span class="main_englobe_titre_span">Login</span></label>
                </div>
                <div class="main_englobe_input">
                    <div class="main_englobe_input_margin">
                        <input type="text" id="login" name="login" placeholder="Pseudo" required="required">
                    </div>
                </div>
            </div>
            <div class="main_englobe_container">
                <div class="main_englobe_titre">
                    <div class="main_englobe_input_label">
                        <label for="password"><span class="main_englobe_titre_span">Mot de passe</span></label>
                    </div>
                </div>
                <div class="main_englobe_input">
                    <div class="main_englobe_input_margin">
                        <input type="password" id="password" name="password" placeholder="Mot de passe" required="required">
                    </div>
                </div>
            </div>
            <div class="main_englobe_container_g">
                <div class="main_englobe_titre">
                    <div class="main_englobe_input_label">
                        <label for="r_password"><span class="main_englobe_titre_span">Confirmer mot de passe</span></label>
                    </div>
                </div>
                <div class="main_englobe_input">
                    <div class="main_englobe_input_margin">
                        <input type="password" id="r_password" placeholder="Confirmer le mot de passe" name="r_password" required="required">
                    </div>
                </div>
            </div>
            <div class="main_englobe_container">
                <div class="main_englobe_titre">
                    <label for="inscription"><span class="main_englobe_titre_span">S'inscrire !</span></label>
                </div>
                <div class="main_englobe_input">
                    <div class="main_englobe_input_margin">
                        <input type="submit" id="inscription" name="inscription" value="S'inscrire">
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php include 'footer/footer_inscription.php';?>
</body>
</html>