<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
?>

<!DOCTYPE html>


	<html>

			
			<head>

				<title>Éditeur d'article</title>
				<meta charset="utf-8" />
				<meta name="description" content="Bootstrap" />
				<meta name="viewport" content="width=device-width, initial-scale=1" />
				<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
				<link rel="stylesheet" type="text/css" href="style_texteditor.css" />
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<script src="bootstrap/bootstrap.min.js"></script>	
				

			</head>



				<body>

					

						<div class="container">

							<div class="Editext">

								<div class="row"> 

									<form method="post" action="script_texteditor.php" name="formulaire" id="formulaire" >

										<div class="col-xs-12 col-md-8 col-md-offset-3">

											<h1 id="redac">Rediger un article</h1>

											<div>
												<input id="titre" name="titre" placeholder="Titre" value="<?php echo $_SESSION["titre"];?>"><br>
												<span id="titreerr" class="error"><?php echo $_SESSION["errtitre"];?></span>
											</div>

											<div>
												<input id="categorie" name="categorie" placeholder="Catégorie" value="<?php echo $_SESSION["categorie"];?>"><br>
												<span id="caterr" class="error"><?php echo $_SESSION["errcat"];?></span>
											<div>

											<div>
												<input id="pseudo" name="pseudo" placeholder="Pseudo" value="<?php echo $_SESSION["pseudo"];?>"><br>
												<span id="pseudoerr" class="error"><?php echo $_SESSION["errpseudo"];?></span>
											<div>

												<textarea id="article" name="article" rows="15" cols="100" placeholder="Écrivez votre article ici" value="<?php echo $_SESSION["article"];?>"></textarea><br>
												<span id="articleerr" class="error"><?php echo $_SESSION["errarticle"];?></span><br>
											</div>


											<input type="submit" value="Publier"/>


										</div>

								</div>


	

														

									</div>
								</div>
							
									</div>
																					

					
						</form>

						<span id="message"></span>
						<span id="msg_all"></span>


						</div>

					<script src ="fichier.js" type="text/javascript"></script>
					<script src ="ajax.js" type="text/javascript"></script>
					<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

					<script>

						    $(function(){

						        $("#formulaire").submit(function(event){

						            var montitre        = $("#titre").val();
						            var monarticle      = $("#article").val();
						            var macategorie      = $("#categorie").val();
						            var monpseudo      = $("#pseudo").val();
						            var meschamps = montitre + monarticle + macategorie + monpseudo;

						            var titrealerte  = "Veuillez entrer votre titre";
									var articlealerte  = "Veuillez entrer votre article";
									var categoriealerte  = "Veuillez entrer une catégorie";
									var pseudoalerte  = "Veuillez entrer un pseudo";
									var erreurenvoi = false;
									
									$("#titreerr").html("");
									$("#articleerr").html("");
									$("#caterr").html("");
						            if (meschamps  == "") {
						                $("#msg_all").html(message);
										var erreurenvoi = true;
						            } 
									if (montitre == "") {
						                $("#titreerr").html(titrealerte);
										var erreurenvoi = true;
						            } 
						            if (monpseudo == "") {
						                $("#pseudoerr").html(titrealerte);
										var erreurenvoi = true;
						            } 
									if (monarticle == "") {
						                $("#articleerr").html(articlealerte);
										var erreurenvoi = true;
						            } 
						            if (macategorie == "") {
						                $("#caterr").html(categoriealerte);
										var erreurenvoi = true;
						            } 

									if (erreurenvoi == false) {
						                $.ajax({
						                    type : "POST",
						                    url: $(this).attr("action"),
						                    data: $(this).serialize(),
						                    success : function() {
						                        $("#formulaire").html("<div class='col-xs-12 col-md-8 col-md-offset-3'><p>L'article a bien été publié !</p></div><br><div class='col-xs-12 col-md-8 col-md-offset-3'><a class='accueil' href='index.php'>Retourner à l'accueil</a></div>");
											
						                    },
						                });
						            }
						            return false;
						        });
						    });
						</script>


				</body>





	</html>

	<!-- yep -->
