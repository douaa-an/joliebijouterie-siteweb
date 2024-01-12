<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact - Jolie Bijouterie</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <script language="JavaScript">
       
    function verification() {
        const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;

    if (name === "") {
      alert("Veuillez taper votre nom!");
      return false;
    }

    if (email === "") {
      alert("Veuillez entrer votre adresse e-mail!");
      return false;
    }

    if (email.indexOf('@') === -1) {
      alert("Adresse e-mail incorrecte!");
      return false;
    }

if (name && email && message) {
      
      alert('Formulaire envoyé !'); 
      return true; // Le formulaire est envoyé si toutes les vérifications sont passées
    } else {
      alert('Veuillez remplir tous les champs !');
      return false;
    }
}
</script>
</head>
<body>

    <header>
        <!-- Barre de navigation -->
        <nav>
          <ul>
            <li><a href="acceuil.php">Accueil</a></li>
            <li><a href="collections.php">Collections</a></li>
            <li><a href="about.php">À propos</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </nav>
      </header>

  <main>
    <!-- Section de Contact -->
    <section class="contact-section">
      <div class="container">
       <center><h2>Nous Contacter</h2>
        <p>Nous vous invitons à nous contacter pour toute question, demande d'information ou préoccupation.<br> Notre équipe dévouée est là pour vous assister. <br>Vous pouvez nous joindre par téléphone du lundi au vendredi, de 9h à 18h, ou nous envoyer un courriel à tout moment. <br>Nous nous efforçons de répondre à toutes les demandes dans les plus brefs délais</p>
       </center>

        <form action="#" method="post" class="contact-form" onsubmit="return  verification()">
          <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>
          </div>
          <button type="submit" class="btn">Envoyer</button>
        </form>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <div class="footer-info">
        <h3> Jolie Bijouterie </h3>
        <p>Adresse : Casablanca, Maroc</p>
        <p>Téléphone : 0620102002</p>
        <p>Email : joliebijouterie@gmail.com</p>
      </div>
      <div class="footer-links">
        <h3>Liens Utiles</h3>
        <ul>
          <li><a href="acceuil.php">Accueil</a></li>
          <li><a href="collections.php">Collections</a></li>
          <li><a href="about.php">À Propos</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="inscription.php">Inscription</a></li>
        </ul>
      </div>
      <div class="social-media">
        <h3>Suivez-nous</h3>
        <ul>
          <li><a href="#"><i class='bx bxl-facebook'></i></a></li>
          <li><a href="#"><i class='bx bxl-twitter' ></i></a></li>
          <li><a href="#"><i class='bx bxl-instagram' ></i></a></li>
         
        </ul>
      </div>
    </div>
  </footer>
  <?php

    
if(isset($_POST['name']) and isset($_POST['message']) and isset($_POST['email']))
{
  if(!empty($_POST['name']) and !empty($_POST['message']) and !empty($_POST['email']))
  {
    try
    {
      global $bdd;
      $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', '');
      
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
  $sql1="select * from user where email='".$_POST['email']."'";
  $reponse = $bdd->query($sql1);
  $donnees = $reponse->fetch();

    if(empty($donnees))
    {   
      $sql2="insert into user(nom, email, message) values('".$_POST['name']."','".$_POST['email']."','".$_POST['message']."')";
      $bdd->exec($sql2);
      echo"<center>Utilisateur ".$_POST['name']." est ajouté avec succés</center>";
    }
    else
    echo "<center>Utilisateur existe déja !!!</center>";
  } 
}
?>
</body>
</html>

