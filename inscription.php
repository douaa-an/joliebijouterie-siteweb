<html>

<head>
    <title>Inscription</title>
    <script language="JavaScript">
       
       function verification() {
            if (document.getElementById("nom").value == "") { alert("Veuillez taper votre nom!"); return false;}
       
    
            if (document.getElementById("eml").value == "") { alert("Veuillez entrer votre adresse e-mail!"); return false;}
           if (document.getElementById("eml").value.indexOf('@') == -1) { alert("Adresse e-mail incorrecte!"); return false; }    
        }
    </script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <centre>
    <h2 style="text-align:center;"><u>INSCRIPTION </u></h2><br>
    <p><strong>Join our community and unlock a world of possibilities! Sign up today to get started on a journey of discovery.<br>
         Connect with like-minded individuals, explore exciting features, and stay updated on the latest updates.<br>
          Your adventure begins with a simple registration.<br>
         Don't miss out  create your account now
    </strong> </p>
   <form id="formulaire_test" action="" method="post" onSubmit="verification()">
 <fieldset>
 
 <table>
 <tr> <td><label for="nom">Nom :</label> </td>
<td> <input type="text" size= "30" id="nom" name="nom" /></td>
</tr>
<tr><td>
  <label for="eml">Adresse e-mail:</label></td>
<td> <input type="text" size="30" name="eml" id="eml"> </td></tr> </table>

 
 
 <input type="radio" id="choix_femme" name="genre" value="genre_femme" />
 <label for="choix_femme" >Femme</label>
 <input type="radio" id="choix_homme" name="genre" value="genre_homme" checked />
 <label for="choix_homme">Homme</label>
 </fieldset>

 <button type="submit" value="ok" >Confirmer</button>
 <button type="reset" value="nok" >Annuler</button>
 </form>
    </centre>
 <?php

    
	if(isset($_POST['nom']) and isset($_POST['genre']) and isset($_POST['eml']))
	{
		if(!empty($_POST['nom']) and !empty($_POST['genre']) and !empty($_POST['eml']))
		{
			try
			{
				global $bdd;
				$bdd = new PDO('mysql:host=localhost;dbname=inscription;charset=utf8', 'root', '');
				
			}
			catch (Exception $e)
			{
					die('Erreur : ' . $e->getMessage());
			}
		$sql1="select * from utilisateur where email='".$_POST['eml']."'";
		$reponse = $bdd->query($sql1);
	    $donnees = $reponse->fetch();
	
			if(empty($donnees))
			{   
				$sql2="insert into utilisateur(nom, email, genre) values('".$_POST['nom']."','".$_POST['eml']."','".$_POST['genre']."')";
				$bdd->exec($sql2);
				echo"<center>Utilisateur ".$_POST['nom']." est ajouté avec succés</center>";
			}
			else
			echo "<center>Utilisateur existe déja !!!</center>";
		} 
	}
	?>
</body>

</html>
