<?php


function verif_util_appartient_rectangle ($pos_x1, $pos_y1, $pos_x2, $pos_y2, $pos_x3, $pos_y3, $pos_x4, $pos_y4, $pos_xutil, $pos_yutil)
{
    $vec_x = $pos_x2 - $pos_x1;
    $vec_y = $pos_y2 - $pos_y1;

    $c = -(-$vec_y*$pos_x1 + $vec_x*$pos_y1);

    if(((-$vec_y*$pos_xutil + $vec_x*$pos_yutil + $c)>=0 && (-$vec_y*$pos_x3 + $vec_x*$pos_y3 + $c)>=0) || ((-$vec_y*$pos_xutil + $vec_x*$pos_yutil + $c)<0 && (-$vec_y*$pos_x3 + $vec_x*$pos_y3 + $c)<0) )
    {
        $vec_x = $pos_x4 - $pos_x3;
        $vec_y = $pos_y4 - $pos_y3;
    
        $c = -(-$vec_y*$pos_x3 + $vec_x*$pos_y3);

        if(((-$vec_y*$pos_xutil + $vec_x*$pos_yutil + $c)>=0 && (-$vec_y*$pos_x1 + $vec_x*$pos_y1 + $c)>=0) || ((-$vec_y*$pos_xutil + $vec_x*$pos_yutil + $c)<0 && (-$vec_y*$pos_x1 + $vec_x*$pos_y1 + $c)<0) )
        {
            $vec_x = $pos_x3 - $pos_x2;
            $vec_y = $pos_y3 - $pos_y2;
        
            $c = -(-$vec_y*$pos_x2 + $vec_x*$pos_y2);

            if(((-$vec_y*$pos_xutil + $vec_x*$pos_yutil + $c)>=0 && (-$vec_y*$pos_x1 + $vec_x*$pos_y1 + $c)>=0) || ((-$vec_y*$pos_xutil + $vec_x*$pos_yutil + $c)<0 && (-$vec_y*$pos_x1 + $vec_x*$pos_y1 + $c)<0) )
            {
                $vec_x = $pos_x4 - $pos_x1;
                $vec_y = $pos_y4 - $pos_y1;
            
                $c = -(-$vec_y*$pos_x1 + $vec_x*$pos_y1);
    
                if(((-$vec_y*$pos_xutil + $vec_x*$pos_yutil + $c)>=0 && (-$vec_y*$pos_x2 + $vec_x*$pos_y2 + $c)>=0) || ((-$vec_y*$pos_xutil + $vec_x*$pos_yutil + $c)<0 && (-$vec_y*$pos_x2 + $vec_x*$pos_y2 + $c)<0) )
                {
                    return true;
                }
            }
        }
    }
    return false;

}

function verif_util_appartient_station ($rayon, $pos_xstation, $pos_ystation, $pos_xutil, $pos_yutil)
{
    $rayon = $rayon/111195;

    if(sqrt(($pos_xstation - $pos_xutil)*($pos_xstation - $pos_xutil) + ($pos_ystation - $pos_yutil)*($pos_ystation - $pos_yutil)) <= $rayon)
    {
        return true;
    }
    return false;
}

function verif_util_appartient_noumea ($pos_xutil, $pos_yutil)
{
    $rayon = sqrt((-22.261251 + 22.318114)*(-22.261251 + 22.318114) + (166.447991 - 166.446618)*(166.447991 - 166.446618));
     
    if(sqrt((-22.261251 - $pos_xutil)*(-22.261251 - $pos_xutil) + (166.447991 - $pos_yutil)*(166.447991 - $pos_yutil)) <= $rayon)
    {
        return true;
    }
    return false;
}

function creation_zone_impacte($vitesse, $temps, $orientation, $pos_x, $pos_y)
{
    $distance = $vitesse*$temps;

    $distance = $distance/111195;
    
    switch($orientation)
    {
        case "N":
                    $ang = pi()/2;
                    $ang_largeur1 = 0;
                    $ang_largeur2 = pi();
                    break;
        
        case "S":
                    $ang = -pi()/2;
                    $ang_largeur1 = 0;
                    $ang_largeur2 = pi();
                    break;

        case "E":
                    $ang = 0;
                    $ang_largeur1 = pi()/2;
                    $ang_largeur2 = -pi()/2;
                    break;

        case "O":
                    $ang = pi();
                    $ang_largeur1 = pi()/2;
                    $ang_largeur2 = -pi()/2;
                    break;

        case "NE":
                    $ang = pi()/4;
                    $ang_largeur1 = 3*pi()/4;
                    $ang_largeur2 = -pi()/4;
                    break;
        
        case "NO":
                    $ang = 3*pi()/4;
                    $ang_largeur1 = pi()/4;
                    $ang_largeur2 = -3*pi()/4;
                   break;
        
        case "SE":
                    $ang = -pi()/4;
                    $ang_largeur1 = pi()/4;
                    $ang_largeur2 = -3*pi()/4;
                    break;
        
        case "SO":
                    $ang = -3*pi()/4;
                    $ang_largeur1 = 3*pi()/4;
                    $ang_largeur2 = -pi()/4;
                    break;
        
        case "NNE":
                    $ang = 3*pi()/8;
                    $ang_largeur1 = 7*pi()/8;
                    $ang_largeur2 = -pi()/8;
                    break;

        case "NNO":
                    $ang = 5*pi()/8;
                    $ang_largeur1 = pi()/8;
                    $ang_largeur2 =  -7*pi()/8;
                    break;

        case "ENE":
                    $ang = pi()/8;
                    $ang_largeur1 = 5*pi()/8;
                    $ang_largeur2 = -3*pi()/8;
                    break;

        case "ONO":
                    $ang = 7*pi()/8;
                    $ang_largeur1 = 3*pi()/8;
                    $ang_largeur2 = -5*pi()/8;
                    break;

        case "SSE":
                    $ang = -3*pi()/8;
                    $ang_largeur1 = pi()/8;
                    $ang_largeur2 = -7*pi()/8;
                    break;

        case "SSO":
                    $ang = -5*pi()/8;
                    $ang_largeur1 = 7*pi()/8;
                    $ang_largeur2 = -pi()/8;
                    break;
        
        case "ESE":
                    $ang = -pi()/8;
                    $ang_largeur1 = 3*pi()/8;
                    $ang_largeur2 = -5*pi()/8;
                    break;

        case "OSO":
                    $ang = -7*pi()/8;
                    $ang_largeur1 = 5*pi()/8;
                    $ang_largeur2 = -3*pi()/8;
                    break;

    }

    $pos_x1= $pos_x + cos($ang)* $distance;
    $pos_y1= $pos_y + cos($ang)* $distance;

    $largeur_rectangle = 750/111195;

    $pos["x"][]= $pos_x + cos($ang_largeur1)* $largeur_rectangle;
    $pos["y"][]= $pos_y + cos($ang_largeur1)* $largeur_rectangle;
    $pos["x"][]= $pos_x + cos($ang_largeur2)* $largeur_rectangle;
    $pos["y"][]= $pos_y + cos($ang_largeur2)* $largeur_rectangle;
    $pos["x"][]= $pos_x1 + cos($ang_largeur2)* $largeur_rectangle;
    $pos["y"][]= $pos_y1 + cos($ang_largeur2)* $largeur_rectangle;
    $pos["x"][]= $pos_x1 + cos($ang_largeur1)* $largeur_rectangle;
    $pos["y"][]= $pos_y1 + cos($ang_largeur1)* $largeur_rectangle;

    return $pos;
}

function niveau_alert_air($id_station)
{
    $SO2 = SO2_Test($id_station);
    $PM10 = PM10_Test($id_station);
    $NO2 = NO2_Test($id_station);
    $O3 = O3_Test($id_station);

    if($SO2 >= $PM10)
    {
        if($SO2 >= $NO2)
        {
            if($SO2 >= $O3)
            {
                if($SO2 == 1)
                {
                    return "green";

                }elseif($SO2 == 2)
                {
                    return "orange";
                }else
                {
                    return "red";
                }
            }
        }
    }else
    {
        if($PM10 >= $NO2)
        {
            if($PM10 >= $O3)
            {
                if($PM10 == 1)
                {
                    return "green";

                }elseif($PM10 == 2)
                {
                    return "orange";
                }else
                {
                    return "red";
                }
            }
        }else
        {
            if($NO2 >= $O3)
            {
                if($NO2 == 1)
                {
                    return "green";

                }elseif($NO2 == 2)
                {
                    return "orange";
                }else
                {
                    return "red";
                }

            }else
            {
                if($O3 == 1)
                {
                    return "green";

                }elseif($O3 == 2)
                {
                    return "orange";
                }else
                {
                    return "red";
                }
            }
        }
    }
}


?>