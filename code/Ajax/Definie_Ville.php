<?php    require_once '/Hackathon/code/modelFabrice.php'; ?>
<div id="maj">
    <?php	
     
        /* Set de la Position */
        $_SESSION["Longitude"] = $_POST['Ajax_Long'];
        $_SESSION["Latitude"] = $_POST['Ajax_Lat'];
        $_SESSION["Ville"] = $_POST['Ajax_Ville'];  
        $caret = '<i class="fa fa-caret-right caret" aria-hidden="true"></i>';

        $niveauFeu = Feu_Test("noumea");
        $niveauAir = $_SESSION["Ville"];
        $lieu = get_pt_prelevement_proche($_SESSION['Latitude'],$_SESSION['Longitude']);
        $baignade = qualification_baignade($lieu);           
    ?>
</div>
