<?php
    //Setup Page
    require_once("configuration/config.php");
    $currentMenuitem = "index";

    //Load header
    require_once("builders/header.php");
?>
    <div class="headertext">Welkom</div>
    <p>
        Mijn naam is Koen van Zuylen. Ik ben programmeur bij <a href="http://interactivestudios.nl/">Interactive Studios</a>. Ik heb Informatica gestudeerd aan de Avans Hogeschool te 's-Hertogenbosch. Op deze site houd ik mijn portfolio bij. Hierin staan onder andere projecten die ik voor school heb gemaakt en projecten die ik in mijn vrije tijd heb gemaakt.
    </p>
<?php
    //Load footer
    require_once("builders/footer.php");
?>