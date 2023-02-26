<?php

// Retourne une connexion à la base de données

function connectPdo(){

	$servname = "localhost"; $dbname = "reservationsalles"; $user = "root"; $pass = "";

	try{
	$pdo = new PDO("mysql:host=$servname;dbname=$dbname", $user , $pass);
 	}
	catch(PDOException $e){
    	echo "Erreur : " . $e->getMessage();
    }

	return $pdo;
}




