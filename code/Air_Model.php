<?php  

/* Return entier Moyenne des mesures de la dernieres Heures */
function Moyenne_Air_Horaire($NB15,$Air,$Lieu){
	$link = open_database_connection();                  
	$query=' SELECT '.$Air.' FROM qualiteair_prelevement WHERE '.$Air.'!=-1 AND idPointPrelevement='.$Lieu.' ORDER BY idReleve DESC LIMIT '.$NB15.' ' ;	
	$resultall = mysqli_query($link,$query);        
	$Moyenne=0; 

	while ($row = mysqli_fetch_assoc($resultall)) {             
         	$res[] = $row;         
	}
	for ($i = 0; $i < $NB15; $i++) {
		$Moyenne=$Moyenne+$res[$i][$Air];
	}

	$Moyenne=$Moyenne/$NB15;
    mysqli_free_result( $resultall);                   
    close_database_connection($link); 
    return $Moyenne;
}

function Recup_Station_Air(){
	$link = open_database_connection();                  
	$query='SELECT * FROM point_prelevement 	WHERE typePrelevement="air" ' ;
	$query;
	$resultall = mysqli_query($link,$query);
	while ($row = mysqli_fetch_assoc($resultall)) {             
		$Station["idPointPrelevement"][] = $row["idPointPrelevement"];
		$Station["codePointPrelevement"][] = $row["codePointPrelevement"]; 
		$Station["typePrelevement"][] = $row["typePrelevement"]; 
		$Station["idLieu"][] = $row["idLieu"];
		$Station["latitude"][] = $row["latitude"]; 
		$Station["longitude"][] = $row["longitude"];  
	}
	mysqli_free_result( $resultall);                   
	close_database_connection($link); 
	return $Station;
}

function Recup_Dernier_Vent(){
	$link = open_database_connection();                  
	$query='SELECT directionVent, vitesseVent FROM vent_noumea 	ORDER BY datetimeReleve DESC LIMIT 1' ;
	$resultall = mysqli_query($link,$query);
	$row = mysqli_fetch_assoc($resultall);         
	$vent["direction"] = $row["directionVent"];
	$vent["vitesse"] = $row["vitesseVent"];
	mysqli_free_result( $resultall);                   
	close_database_connection($link); 
	return $vent;
}

/* Return Chaine de caractere Vert/Orange/Rouge */

function SO2_Test($id_station){         
	$link = open_database_connection();
	$query= "SELECT AVG(SO2) FROM qualiteair_prelevement WHERE idPointPrelevement = '.$id_station.' ORDER BY datetimeReleve DESC LIMIT 15 ";
	$Test= mysqli_query($link, $query ); 
	$res = mysqli_fetch_assoc($Test);

	if( $res >= 500 ){
		$Alert = 3;
	}
	elseif( $res >= 300 ){
		$Alert = 2;
	}
	else{
		$Alert = 1;
	}
	close_database_connection($link);
	return $Alert;    
}   

function PM10_Test($id_station){         
	$link = open_database_connection();
	$query= "SELECT AVG(PM10) FROM qualiteair_prelevement WHERE idPointPrelevement = '.$id_station.' ORDER BY datetimeReleve DESC LIMIT 96 ";
	$Test= mysqli_query($link, $query ); 
	$res = mysqli_fetch_assoc($Test);

	if( $res >= 80 ){
		$Alert = 3;
	}
	elseif( $res >= 50 ){
		$Alert = 2;
	}
	else{
		$Alert = 1;
	}
	close_database_connection($link);
	return $Alert;    
}  

function NO2_Test($id_station){         
	$link = open_database_connection($id_station);
	$query= "SELECT AVG(NO2) FROM qualiteair_prelevement WHERE idPointPrelevement = '.$id_station.' ORDER BY datetimeReleve DESC LIMIT 5 ";
	$Test= mysqli_query($link, $query ); 
	$res = mysqli_fetch_assoc($Test);

	if( $res >= 400 ){
		$Alert = 3;
	}
	elseif( $res >= 200 ){
		$Alert = 2;
	}
	else{
		$Alert = 1;
	}
	close_database_connection($link);
	return $Alert;    
}  

function O3_Test($id_station){         
	$link = open_database_connection();
	$query= "SELECT AVG(O3) FROM qualiteair_prelevement WHERE idPointPrelevement = '.$id_station.' ORDER BY datetimeReleve DESC LIMIT 5 ";
	$Test= mysqli_query($link, $query ); 
	$res = mysqli_fetch_assoc($Test);

	if( $res >= 240 ){
		$Alert = 3;
	}
	elseif( $res >= 180 ){
		$Alert = 2;
	}
	else{
		$Alert = 1;
	}
	close_database_connection($link);
	return $Alert;    
}  



?>