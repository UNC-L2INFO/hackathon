<?php
   
   require_once 'model.php';
   require_once 'modelFabrice.php';
   require_once 'Air_Model.php';
   require_once 'Controller.php';
   require_once 'Controller_Air.php';


   session_start();
    
    $_SESSION["Longitude"]="";
    $_SESSION["Latitude"]="";
    $_SESSION["Ville"]="";

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

   if('/Hackathon/code/' == $uri)
   {
        $uri='/Hackathon/code/index';
        $uri = trim($uri.".php");
   }
   
     
    if('/Hackathon/code/index.php' == $uri)
    {
        accueil_action(); 
    }elseif ('/Hackathon/code/index.php/carte_vide' == $uri)
    {
        carte_vide_action();

    }elseif('/Hackathon/code/index.php/detail_feu' == $uri)
    {
        carte_feu_action();

    }elseif('/Hackathon/code/index.php/detail_eau' == $uri)
    {
        carte_eau_action();

    }elseif('/Hackathon/code/index.php/carte_meteo' == $uri)
    {
        carte_meteo_action();

    }elseif('/Hackathon/code/index.php/carte_population' == $uri)
    {
        carte_population_action();

    }elseif('/Hackathon/code/index.php/detail_air' == $uri)
    {
        carte_air_action();

    }elseif('/Hackathon/code/index.php/carte_vide' == $uri)
    {
        carte_action();

    }else  
    {
        erreur_404_action();

    }
      
?>