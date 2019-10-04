<?php
session_start();


if(isset($_SESSION['login_in'])){
  echo '<p style="margin-bottom: 0;margin-left: 20px;">' . $_SESSION['pseudo'] .   ' est connecté  <i class="fas fa-circle" style="color: #4CAF50; font-size: 0.7em;"></i> </p>';
} else {
  echo '<p style="margin-bottom: 0;margin-left: 20px;">déconnecté  <i class="fas fa-circle" style="color: red; font-size: 0.7em;"></i> </p>' ;
}

?>

<?php include("header.php"); ?>

<body>
  <!-- Header image -->
  <header id="header">
    <section id="logo" class="col-12 p-5">
        <img src="img/header.png"/>
    </section>
  </header>

  <main>

<?php include("menu.php"); ?>

<section id="login">
  <div id="id01" class="modal">

    <form class="modal-content animate" action="login.php" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
      </div>

<!-- <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Formulaire login >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> -->
			<div class="container">
			 <label for="pseudo"><b>Pseudo</b></label>
			 <input type="text" placeholder="Entrer votre pseudo" name="pseudo" required>

			 <label for="password"><b>Mot de passe</b></label>
			 <input type="password" placeholder="Entrer votre mot de passe" name="password" required>

			 <button type="submit" style="border-radius: 5px;">Se connecter</button>
			 <label>
				 <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
			 </label>
		 </div>
<!-- <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Formulaire Creer un Compte >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> -->
      <!-- <div class="container">
        <label for="pseudo"><b>Pseudo</b></label>
        <input type="text" placeholder="Entrer votre pseudo" name="pseudo" required>

        <label for="password"><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer votre mot de passe" name="password" required>

				<label for="email"><b>Email</b></label>
        <input type="text" placeholder="Entrer votre mot de passe" name="email" required>

        <button type="submit" style="border-radius: 5px;">Se connecter</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
        </label>
      </div> -->

      <div class="container" style="background-color:#f1f1f1; border: 1px solid gainsboro; border-bottom-left-radius: 3px;border-bottom-right-radius: 0.3rem">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="border-radius: 5px;">Quitter</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="border-radius: 5px; background-color: #0096ff;">Creer un compte</button>
        <span class="psw">Mot de passe <a href="#">oublié?</a></span>
      </div>
    </form>
  </div>
</section>

<?php include("articles.php"); ?>

<?php include("content.php"); ?>

<?php include("footer.php"); ?>
