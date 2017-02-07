<?php

$url = $_GET["donnees"]; 


if ($url !== null) {

   $pdo = new PDO('mysql:host=localhost;dbname=romaneh', "romaneh", "866Tnq7BVQ", array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
   if (!isset($_GET['limit'])) {
       $val["pseudo"];
       $query = $pdo->query("SELECT * FROM author WHERE pseudo = ".$val["pseudo"]." ORDER BY id_article DESC LIMIT 0,4");
   }
    else {
        $query = $pdo->query("SELECT * FROM author WHERE pseudo = ".$val["pseudo"]." ORDER BY id_article DESC LIMIT ".$_GET['limit']);  
    }
   
   $result = $query->fetchAll();
   

   foreach ($result as $row){
    echo "<div><br>";
    
    print "<a href='index.php?paramurl=".$row["id_article"]."'><h2 class='titre' onclick='popup()'>".$row["titre"]."</h2></a>";
    print "<p class='text'>".$row["texte"]."<p>";
    print "<p class='cat'>".$row["nom_categorie"]."</p>";
    print "<h5 class='autor'>Article de ".$row["pseudo"]."</h5>";
    echo "</div>";
   }

?>