<?php 
session_start();
header('Content-Type: text/html; charset=utf-8');

$titre = $categorie = $article = $pseudo = "";
$error = false;

//conditions

    if ( (isset($_POST["titre"])) && (strlen(trim($_POST["titre"])) > 0) ) {
        $titre = stripslashes(strip_tags($_POST["titre"]));	
    }
	else {
        echo "Merci d'écrire un titre <br />";
		$error = true;
        $titre = "";
    }

    if ( (isset($_POST["categorie"])) && (strlen(trim($_POST["categorie"])) > 0) ) {
        $categorie = stripslashes(strip_tags($_POST["categorie"]));	
    } 
	else {
        echo "Merci d'écrire une catégorie <br />";
		$error = true;
        $categorie = "";
    }

      if ( (isset($_POST["pseudo"])) && (strlen(trim($_POST["pseudo"])) > 0) ) {
        $pseudo = stripslashes(strip_tags($_POST["pseudo"]));	
    } 
	else {
        echo "Merci d'écrire un pseudo <br />";
		$error = true;
        $pseudo = "";
    }

    if ( (isset($_POST["article"])) && (strlen(trim($_POST["article"])) > 0) ) {
        $article = stripslashes(strip_tags($_POST["article"]));	
    } 
	else {
        echo "Merci d'écrire votre article <br />";
		$error = true;
        $article = "";
    }
	
	if ($error == false) {
	try {
	$id = 'romaneh';
	$pw = '866Tnq7BVQ';
	$pdo = new PDO('mysql:host=localhost;dbname=romaneh', $id, $pw, array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$query = $pdo->query("INSERT INTO item (titre , nom_categorie, texte, pseudo) VALUES ('$titre', '$categorie', '$article', '$pseudo')");
	$query = $pdo->query("INSERT INTO category (nom_categorie) VALUES ('$categorie')");
	$query = $pdo->query("INSERT INTO author (pseudo) VALUES ('$pseudo')");
	$pdo = null;
	
	}
	catch(PDOException $e) {
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
	}

	}
	else {
		echo("erreur");
	}	
	 // header('Location: Texteditor.php');
	 ?>

