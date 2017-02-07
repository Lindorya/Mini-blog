<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
        <title>Projet mini blog acs</title>
        <meta name="description" content="Bootstrap" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/style_index.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script src="popup.js"></script>
	</head>
	
<body>

<header class="container">
<nav class="navbar padd navbar-default">
  <div class="container-fluid">
    <div class="padd navbar-header">
      <a class="navbar-brand accueil" href="index.php">Accueil</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="categories dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catégories <span class="caret"></span></a>
              <ul class="dropdown-menu">
                
                  <?php 
                     $pdo_c = new PDO('mysql:host=localhost;dbname=romaneh', "romaneh", "866Tnq7BVQ", array(
                     PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                     $category = $pdo_c->query("SELECT nom_categorie FROM item GROUP BY nom_categorie");
                     $rlt = $category->fetchAll();
                     foreach ($rlt as $cat) {
                        print "<li><a href='index.php?categorie=".$cat["nom_categorie"]."'>".$cat["nom_categorie"]."</a></li>";
                     }
                ?>  
                
              </ul>
        </li>
        <li class="dropdown auteurs">
          <a href="#" class="categories dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Auteurs <span class="caret"></span></a>
              <ul class="dropdown-menu">
               
                <?php 
                     $pdo = new PDO('mysql:host=localhost;dbname=romaneh', "romaneh", "866Tnq7BVQ", array(
                     PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                     $author = $pdo->query("SELECT id_auteur,pseudo FROM author GROUP BY pseudo ORDER BY pseudo ASC");
                     $res = $author->fetchAll();
                     foreach ($res as $val) {
                        print "<li><a class='auteurs' href='index.php?pseudo=".$val["pseudo"]."'>".$val["pseudo"]."</a></li>";
                     }
                ?>
                
              </ul>
        </li>
      </ul>
      <h1 class="blog padd col-xs-12 col-lg-6">Le blog de Sarody</h1>
      <ul class="nav navbar-nav navbar-right list-group-item-success">
        <li><a class="new-art" href="Texteditor.php">+ NOUVEL ARTICLE</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>
  
  
   
<main class="container">
      

<?php 


   $dbh = new PDO('mysql:host=localhost;dbname=romaneh', "romaneh", "866Tnq7BVQ", array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
   if (empty($_GET)) {
       
       $query = $dbh->query("SELECT * FROM item ORDER BY id_article DESC");
   }
   else if (isset($_GET['pseudo'])) {
	   $query = $dbh->query("SELECT * FROM item WHERE pseudo='".$_GET['pseudo']."' ORDER BY id_article DESC");
	   
   }
   else if (isset($_GET['categorie'])) {
	   $query = $dbh->query("SELECT * FROM item WHERE nom_categorie='".$_GET['categorie']."' ORDER BY id_article DESC");
   }
   
   
   $result = $query->fetchAll();
   

   foreach ($result as $row){
    echo "<div><br>";
    
    print "<h2 class='titre'>".$row["titre"]."</h2>";
    print "<p class='text'>".$row["texte"]."<p>";
    print "<p class='cat'>".$row["nom_categorie"]."</p>";
    print "<h5 class='autor'>Article de ".$row["pseudo"]."</h5>";
    echo "<div class='box'><a class='button' href='popup.php?id_article=".$row["id_article"]."' id_article='".$row["id_article"]."'>Lecture zen</a></div>";
   }

?>
<div id="display_auteur"></div>
</main>



<script type="text/javascript">
            
    $(document).ready(function(){

        $(".next").on("click", function(e){   
                
            $('.less').css('visibility', 'visible');
                

            });
        });
    
</script>     
    


</body>
</html>

<div id="popup1" class="overlay">
	<div class="popup">
	
		
		
		<a class="close" href="#">&times;</a>
		<div class="content">
			
		</div>
	</div>
</div>
    
    



