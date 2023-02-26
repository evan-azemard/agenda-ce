<div id="h_main">
    <nav id="h_container">
        <ul>
            <li>Menu
                <ul>
                    <li><a href="index.php"> Home </a></li>
                    <li><a href="planning.php">Planning</a></li>
                    <li><a href="reservation-form.php">Reservation</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<header id="index_header">
    <div class="index_header_container">
        <div id="index_header_menu">

        </div>
        <?php centreTitre()?>
        <h1>Tartanpion</h1>

    </div>
    <?php pseudo(); ?>
    </div>
    <div class="index_header_container">
        <div class="index_ins-conex">
            <?php remplace('inscription.php','inscription'); ?>
        </div>
        <div class="index_ins-conex">
            <?php remplace2('profil','profil.php','connexion','connexion.php'); ?>
        </div>
    </div>
</header>