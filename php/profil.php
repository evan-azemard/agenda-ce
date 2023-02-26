<?php
session_start();
require_once('../library/Utils.php');
include('User.php');
access2('index.php');

if(isset($_POST["modifier"])){
    $user = new Utilisateurs();
    $errors = $user->profil($_POST['n_login'],$_POST['n_password'],$_POST['modifier']);
}
else {
    $errors = array();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="../css/reservationsalles.css">
    <link rel="shortcut icon" href="https://th.bing.com/th/id/OIP.W-ukJI6sI6FTEyYw1i5TVAHaLG?w=137&h=205&c=7&o=5&pid=1.7"/>
    <link rel="preconnect">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Harmattan&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Harmattan:wght@700&display=swap" rel="stylesheet">
    <meta name="description" content="Reserver votre salle en ligne !" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <title>Profil</title>
</head>
<body id="connexion_body">
<?php include 'header/header_profil.php';  ?>
<main id="connexion_main">
    <form method="post">
        <div id="connexion_main_englobe">
            <div id="main_englobe_titre_1">
                <div id="main_englobe_titre_1_h1">
                    <h1 class="titrecolor">Profil</h1>
                    <?php
                    foreach ($errors as $error) {
                        echo "<div id='error_ins'>";
                        echo "• " . $error . "<br>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="main_englobe_container_g">
                <div class="main_englobe_titre">
                    <label for="n_login"><span class="main_englobe_titre_span">Nouveau Pseudo</span></label>
                </div>
                <div class="main_englobe_input">
                    <div class="main_englobe_input_margin">
                        <input type="text" id="n_login" name="n_login" placeholder="Nouveau pseudo" required="required">
                    </div>
                </div>
            </div>
            <div class="main_englobe_container">
                <div class="main_englobe_titre">
                    <div class="main_englobe_input_label">
                        <label for="n_password"><span class="main_englobe_titre_span">Nouveau mot de passe</span></label>
                    </div>
                </div>
                <div class="main_englobe_input">
                    <div class="main_englobe_input_margin">
                        <input type="password" id="n_password" name="n_password" placeholder="Nouveau mot de passe" required="required">
                    </div>
                </div>
            </div>
            <div class="main_englobe_container_g">
                <div class="main_englobe_titre">
                    <label for="modifier"><span class="main_englobe_titre_span">Modifier !</span></label>
                </div>
                <div class="main_englobe_input">
                    <div class="main_englobe_input_margin">
                        <input type="submit" id="modifier" name="modifier" value="Modifier">
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<?php include 'footer/footer_profil.php';?>
</body>
</html>