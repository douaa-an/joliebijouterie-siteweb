<?php 
  if(isset($_POST['boutton-valider'])){ //si on clique sur le boutton alors:
    include('fonction1.php');
    if(isset($_POST['email']) and isset($_POST['mdp']))
    {   $erreur="";
        if($_POST['email']=='admin@gmail.com' and $_POST['mdp']=='admin')
                 header( "location: acceuil.php");
        else
        {
        
            $erreur="Adresse email ou Mot de passe incorrect";
        }
    }
  }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
   <section>
    <h1> Authentification </h1>
    <?php 
    if(isset($erreur)){ // si la variable $erreur existe, on affiche le contenu
        echo "<p class='erreur'>" .$erreur. "</p>";
    }
    ?>
    <form action="" method="POST">
    <label> Adresse Email </label>
    <input placeholder="Email" type="email" name="email" >
    <label> Password </label>
    <input placeholder="Password" type="password" name="mdp">
    <input type="submit" value="Connexion" name="boutton-valider">
    </form>
</section>

</body>
</html>