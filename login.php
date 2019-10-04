<?php
session_start();
// initialisation
if (isset($_POST['pseudo']) AND isset($_POST['password']))
{
  try
  {
  	$bdd = new PDO('mysql:host=localhost;dbname=db_startuprr;charset=utf8', 'root', '');
  }
  catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }
$ps = $_POST['pseudo'];

  //  Récupération de l'utilisateur et de son pass hashé
  $req = $bdd->prepare('SELECT id, pseudo, password FROM login WHERE pseudo = :pseudo');
  $req->execute(array('pseudo' => $ps));
  echo $ps;
  $resultat = $req->fetch();

  // Comparaison du pass envoyé via le formulaire avec la base
  $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
  if (!$resultat)
  {
      echo 'Mauvais identifiant ou mot de passe !';
      $_SESSION['login_in'] = null;
      header('Location: index.php');
      $_SESSION['pseudo'] = "";
  }
  else
  {
      if ($isPasswordCorrect) {
          session_start();
          $_SESSION['id'] = $resultat['id'];
          $_SESSION['pseudo'] = $ps;
          header('Location: index.php');
          $_SESSION['login_in'] = true;
      }
      else if (!$isPasswordCorrect) {
        echo 'Mauvais identifiant ou mot de passe !';
        $_SESSION['login_in'] = null;
        header('Location: index.php');
        $_SESSION['pseudo'] = "";

      }
  }
// Puis rediriger vers minichat.php comme ceci :
// header('Location: message.php');
}


?>




<!--<<<<<<<<<<<<<<<<<<<<<<<<<<  formulaire inscription >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> -->
<?php
//
// if (isset($_POST['pseudo']) AND isset($_POST['password']) AND isset($_POST['email'])) // On a le nom et le prénom
// {
//   $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
//   try
//   {
//   	$bdd = new PDO('mysql:host=localhost;dbname=db_startuprr;charset=utf8', 'root', '');
//   }
//   catch (Exception $e)
//   {
//           die('Erreur : ' . $e->getMessage());
//   }
//   // On ajoute une entrée dans la table jeux_video
//   $req = $bdd->prepare('INSERT INTO login(pseudo, email, password) VALUES(:pseudo, :mail, :psw)');
//   $req->execute(array(
//   	'pseudo' => $_POST['pseudo'],
//     'mail' => $_POST['email'],
//   	'psw' => $pass_hache
//   	));
//
//   echo 'le compte de ' . $_POST['pseudo'] . ' a bien été enregistré !';
//
// }
// else // Il manque des paramètres, on avertit le visiteur
// {
// 	echo '<p style="text-align: center; color: red; font-size: 2em; font-weight: bold;">!!!!!Attention!!!!! <br> Il faut renseigner un Pseudo,<br> un Email <br> et un Mot de passe ! </p>';
// }
// // Puis rediriger vers minichat.php comme ceci :
// // header('Location: message.php');
?>
