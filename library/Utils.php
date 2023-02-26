<?php
//redirection
function redirect($url){

	header("Location: $url");
	exit();

}



//deconnexion

function disconnect(){

	if (!isset($_SESSION["id"])) {
		echo "";
	}else {
		echo '<div id="boutton_deconnexion">';
		echo '<form method="post">';
		echo '<input id="deconnexion" type="submit" name="deconnexion" value="Déconnexion">';
		echo '</form>';
		echo '</div>';
			if (isset($_POST["deconnexion"])) {
				unset($_SESSION['id']);
				redirect("index.php");
			}
	}
}



//affiche pseudo si connecté

function pseudo(){

	if(!isset($_SESSION['id'])){
		echo '';
	}else{
		echo '<div id="index_header_username">';
		echo '<div id="lien_profil_header">';
		echo '<a href="profil.php">';
		echo  Htmlspecialchars($_SESSION["login"]);
		echo '</a>';
		echo '</div>';
		echo '</div>';
	}
}


//centrage titre si connecté ou pas

function centreTitre(){

		if(!isset($_SESSION['id'])){
			echo '<div id="index_header_titre_deco">';
		}else{
			echo '<div id="index_header_titre">';
		}
}
//centrage tire du planning si connecté ou pas
function centreTitre2(){

		if(!isset($_SESSION['id'])){
			echo '<div id="index_header_titre_deco2">';
		}else{
			echo '<div id="index_header_titre2">';
		}
}

//donner  accées si pas connecté
function access($urla,$urlb = null){

	if(isset($_SESSION['id'])){
		header("Location: $urla");
	}elseif(isset($_SESSION['id'])){
		header("Location: $urlb");
	}

}

//donner accées si connecté
function access2(){

	if(!isset($_SESSION['id'])){
		header("Location: connexion.php");
	}
}

//remplacer lien par button déconnexion
function remplace($url,$name){
		if(isset($_SESSION['id'])){
			disconnect();
		}else{
			echo "<a href='$url'>";
			echo "$name";
			echo "</a>";
		}
}

function remplace2($nameA,$urlA,$nameB,$urlB){
		if(isset($_SESSION['id'])){
			echo "<a href='$urlA'>";
			echo"$nameA";
			echo "</a>";
		}if(empty($_SESSION['id'])){
			echo "<a href='$urlB'>";
			echo "$nameB";
			echo "</a>";
		}
}
