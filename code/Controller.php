<?php

    function accueil_action()
    {	 
        $caret = '<i class="fa fa-caret-right caret" aria-hidden="true"></i>';
        $lieu = get_pt_prelevement_proche(-22.262884,166.404669);
        $_SESSION['Latitude'] = -22.262884;
        $_SESSION['Longitude'] = 166.404669;
        $niveauBaignade = qualification_baignade($lieu);
        $niveauFeu = Feu_Test("noumea");
        /* AIR */
        $tab['green'] = 0;
        $tab['orange'] = 1;
        $tab['red'] = 2;
        
        if (verif_util_appartient_noumea ($_SESSION['Latitude'], $_SESSION['Longitude'])) 
        {
            $vent = Recup_Dernier_Vent();
            $stations = Recup_Station_Air();
            $niveauAir = "green";
            foreach ($stations["idPointPrelevement"] as $key => $value) 
            {
                if (verif_util_appartient_station (500, $stations["latitude"][$key], $stations["longitude"][$key], $_SESSION['Latitude'], $_SESSION['Longitude']))
                {
                    $nivStation = niveau_alert_air($value);
                    if ($tab[$niveauAir] > $tab[$nivStation])
                    {
                        $niveauAir = $value;
                    }
                }
            }
            if ($niveauAir == "green") 
            {
                foreach ($stations["idPointPrelevement"] as $key => $value) 
                {
                    $tabPos = creation_zone_impacte($vent['vitesse'], 3600, $vent['direction'], $stations["latitude"][$key], $stations["longitude"][$key]);
                    if(verif_util_appartient_rectangle ($tabPos['x'][0], $tabPos['y'][0], $tabPos['x'][1], $tabPos['y'][1], $tabPos['x'][2], $tabPos['y'][2], $tabPos['x'][3], $tabPos['y'][3], $_SESSION['Latitude'], $_SESSION['Longitude']))
                    {
                        $nivStation = niveau_alert_air($value);
                        if ($tab[$niveauAir] > $tab[$nivStation])
                        {
                            $niveauAir = $value;
                        }
                    }
                }
            }
        }
        else
        {
            $niveauAir = 'green'; 
        }

        require 'view/Page_accueil.php'; 
        require 'view/shared/_Layout.php'; 
    }

    function carte_vide_action()
    {	
        require 'view/Page_detail_vide.php';
        require 'view/shared/_Layout.php';    
    }

    function carte_feu_action()
    {	
        $niveauFeu = Feu_Test("noumea");
        require 'view/Page_detail_feu.php';
        require 'view/shared/_Layout.php';   
    }

    function carte_eau_action()
    {	
        $lieu = get_pt_prelevement_proche(-22.262884,166.404669);
        $niveauBaignade = qualification_baignade($lieu);
        require 'view/Page_detail_eau.php';
        require 'view/shared/_Layout.php';

    }

    function carte_meteo_action()
    {	
        require 'view/Page_detail_meteo.php';
        require 'view/shared/_Layout.php';    
    }

    function carte_population_action()
    {	
        require 'view/Page_detail_population.php';
        require 'view/shared/_Layout.php';   
    }
	
	function carte_air_action()
    {	
        $niveauAir = "orange"; //Inserer fonction retournant le niveau d'alerte de polution de l'air
        require 'view/Page_detail_air.php'; 
        require 'view/shared/_Layout.php';   
    }

    function erreur_404_action()
    {
        //require 'view/404.html';
    }


?>