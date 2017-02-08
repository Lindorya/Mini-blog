
    
<?php 

 $pdo = new PDO('mysql:host=localhost;dbname=romaneh', "romaneh", "866Tnq7BVQ", array(
 PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 $author = $pdo->query("SELECT * FROM item WHERE id_article=".$_GET['id_article']);
 $res = $author->fetchAll();

foreach ($res as $row){
    echo "<div><br>";
    
    print "<h2 class='titre' onclick='popup()'>".$row["titre"]."</h2>";
    print "<p class='cat'>".$row["nom_categorie"]."</p>";
    print "<p class='text'>".$row["texte"]."<p>";   
    print "<h5 class='autor'>".$row["pseudo"]."</h5>";
   }
?>