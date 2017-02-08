<!DOCTYPE html>


  <html>

  	<head>

          <meta charset="utf-8" />
          <title>Mini blog</title>
          <meta name="description" content="Bootstrap" />
          <meta name="viewport" content="width=device-width, initial-scale=1" />
          <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
          <link rel="stylesheet" type="text/css" href="style_index.css"/>
          <link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="bootstrap/bootstrap.min.js"></script>
          <script src="popup.js"></script>


  	</head>
  	
  <body>

  <header>

  <div id="header-wrap">
  <div id="header">

    <div class="container">

      <div class="row">

        <div class="col-xs-12 col-md-5">

          <a href="index.php"><img src="images/home.png" id="home"></a>

        </div>

        <div class="col-xs-12 col-md-6">

          <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blog</h1>

        </div>

        <div class="col-xs-12 col-md-1">

          <a href="Texteditor.php"><img src="images/pen.png" id="pen"></a>

        </div>

      </div>

      </div>
      <div class="fond">
      <div class="container">

      <div class="row">

        <div class="col-xs-12 col-md-3 col-md-offset-4">

                 <ul class="nav nav-pills">
                   <li class="dropdown">
                      <a href="#" data-toggle="dropdown" class="dropdown-toggle" id="cat">Catégories<b class="caret"></b></a>
                       <ul class="dropdown-menu" id="menu1">
                    
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

        </div>
        <div class="col-xs-12 col-md-4">

                      <ul class="nav nav-pills">
                       <li class="dropdown">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle" id="aut">Auteurs<b class="caret"></b></a>
                           <ul class="dropdown-menu" id="menu2">
                   
                      <?php 
                         $pdo_c = new PDO('mysql:host=localhost;dbname=romaneh', "romaneh", "866Tnq7BVQ", array(
                         PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                         $author = $pdo_c->query("SELECT pseudo FROM item GROUP BY pseudo");
                         $rlt = $author->fetchAll();
                         foreach ($rlt as $aut) {
                            print "<li><a href='index.php?pseudo=".$aut["pseudo"]."'>".$aut["pseudo"]."</a></li>";
                         }
                    ?>  
                    
                    
                  </ul>

        </div>
      </div>
      </div>
      </div>
      </div>
 

  </header>


  
    <div class="fondacc"> 
      <img id="laphoto" src="images/photo.jpeg">
    </div>
   
        <main class="container">
      
          <div class="fondart">

              <?php 


                 $dbh = new PDO('mysql:host=localhost;dbname=romaneh', "romaneh", "866Tnq7BVQ", array(
                  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                      
                 if (empty($_GET)) {
                     
                     $query = $dbh->query("SELECT * FROM item ORDER BY id_article DESC");
                 }
                 else if (isset($_GET['pseudo'])) {
                   $query = $dbh->query("SELECT * FROM item WHERE pseudo='".$_GET['pseudo']."' ORDER BY id_auteur DESC");
                 }
                 
                 else if (isset($_GET['categorie'])) {
              	   $query = $dbh->query("SELECT * FROM item WHERE nom_categorie='".$_GET['categorie']."' ORDER BY id_article DESC");
                 }
                 
                 
                 $result = $query->fetchAll();
                 

                 foreach ($result as $row){
                  echo "<div><br>";
                  
                  print "<h2 class='titre'>".$row["titre"]."</h2>";
                  print "<p class='cat'>".$row["nom_categorie"]."</p>";
                  print "<p class='text'>".$row["texte"]."<p>";                  
                  print "<h5 class='autor'>De ".$row["pseudo"]."</h5>";
                  echo "<div class='box'><a class='button' href='popup.php?id_article=".$row["id_article"]."' id_article='".$row["id_article"]."'>Lire l'article</a></div>";
                  echo "<br><hr>";
                 }

              ?>

          </div>

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
    
    



