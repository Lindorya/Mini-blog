<?php 


   $dbh = new PDO('mysql:host=localhost;dbname=romaneh', "romaneh", "866Tnq7BVQ", array(
PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
   if (!isset($_GET['limit'])) {
       $query = $dbh->query("SELECT * FROM item ORDER BY id_article DESC LIMIT 4");
   }
    else {
        $query = $dbh->query("SELECT * FROM item ORDER BY id_article DESC LIMIT ".$_GET['limit']);    
    }
   
   $result = $query->fetchAll();
   

   foreach ($result as $row){
    echo "<div><br>";
    
    print "<h2 class='titre'>".$row["titre"]."</h2>";
    print "<p class='text'>".$row["texte"]."<p>";
    print "<h5 class=''>Publié le ".$row["date_article"]."<br>";
    print "<h5 class=''>Article de ".$row["pseudo"]."<br>";
    echo "</div>";
   }

?>

