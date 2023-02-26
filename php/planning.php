<?php
session_start();
require('../php/Table.php');
require_once('../library/Utils.php');
$reservation = new Reservation();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- 	<script src="https://use.fontawesome.com/d3028f0b61.js"></script>
 --><link rel="stylesheet" type="text/css" href="../css/reservationsalles.css">
    <link rel="shortcut icon" href="https://th.bing.com/th/id/OIP.W-ukJI6sI6FTEyYw1i5TVAHaLG?w=137&h=205&c=7&o=5&pid=1.7"/>
    <link rel="preconnect">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Harmattan&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Harmattan:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
    <meta name="description" content="Reserver votre salle en ligne !" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <title>Planning</title>
</head>
<body id="planning_body">
<?php include ('header/header_planning.php'); ?>
<main id="planning_main">
    <div class="planning_container_table">
        <table>
            <thead>
                <tr>
                    <th class="vide"></th>
                    <th class="jour">Lun.<br> <?php echo $jour_semaine = date('d/m', strtotime('monday this week'));?></th>
                    <th class="jour">Mar.<br> <?php echo $jour_semaine = date('d/m', strtotime('tuesday this week'));?></th>
                    <th class="jour">Mer.<br> <?php echo $jour_semaine = date('d/m', strtotime('wednesday this week'));?></th>
                    <th class="jour">Jeu.<br> <?php echo $jour_semaine = date('d/m', strtotime('thursday this week'));?></th>
                    <th class="jour">Ven.<br> <?php echo $jour_semaine = date('d/m', strtotime('friday this week'));?></th>
                </tr>
            </thead>
            <tbody>
                <?php include 'affichePlanning.php';?>
            </tbody>
        </table>
    </div>
</main>
<?php include ('footer/footer_planning.php'); ?>
</body>
</html>