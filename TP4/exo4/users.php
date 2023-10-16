<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Users</title>
</head>

<body>
  <header>
    <h1>Users</h1>
  </header>

  <?php
  require_once('../connexion.php');

  //Création d'un nouvel utilisateur
  //--------------------------------------------------------------------------------------------------
  if (isset($_POST['name_input']) && isset($_POST['email_input']) && isset($_POST['id_input']) && ($_POST['id_input'] == "")) {
    $sql = "INSERT INTO users VALUES ('','" . $_POST['name_input'] . "','" . $_POST['email_input'] . "')";
    $request = $pdo->prepare($sql);
    $test = $request->execute();
    if ($test) {
      echo "<div>La création a été effectuée avec succès</div>";
    } else {
      echo "<div>La création a échouée</div>";
    }
  }
  //--------------------------------------------------------------------------------------------------

  //Suppression d'un utilisateur
  //--------------------------------------------------------------------------------------------------
  if (isset($_POST['id_suppr'])) {
    $sql = "DELETE FROM users WHERE id='" . $_POST['id_suppr'] . "'";
    $request = $pdo->prepare($sql);
    $test = $request->execute();
    if ($test) {
      echo "<div>La suppression a été effectuée avec succès</div>";
    } else {
      echo "<div>La suppression a échouée</div>";
    }
  }
  //--------------------------------------------------------------------------------------------------

  //initialisation de la modification d'un utilisateur
  //--------------------------------------------------------------------------------------------------
  $id = "";
  $name = "";
  $email = "";
  $texte_bouton = "Ajouter";
  if (isset($_POST['id_modif'])) {
    $sql = "SELECT * FROM users WHERE id='" . $_POST['id_modif'] . "'";
    $request = $pdo->prepare($sql);
    $request->execute();
    $res = $request->fetchAll(PDO::FETCH_OBJ);
    $id = $res[0]->id;
    $name = $res[0]->name;
    $email = $res[0]->email;

    $texte_bouton = "Modifier";
  }
  //--------------------------------------------------------------------------------------------------

  //Modification d'un utilisateur
  //--------------------------------------------------------------------------------------------------
  if (isset($_POST['name_input']) && isset($_POST['email_input']) && isset($_POST['id_input']) && (strlen($_POST['id_input']) != 0)) {
    $sql = "UPDATE users SET NAME='" . $_POST['name_input'] . "', EMAIL='" . $_POST['email_input'] . "' WHERE id=" . $_POST['id_input'];
    $request = $pdo->prepare($sql);
    $test = $request->execute();
    if ($test) {
      echo "<div>La modification a été effectuée avec succès</div>";
    } else {
      echo "<div>La modification a échouée</div>";
    }
  }
  //--------------------------------------------------------------------------------------------------

  //Affichage de tous les utilisateurs et des boutons de modifier et supprimer
  //--------------------------------------------------------------------------------------------------
  $sql = "SELECT * FROM users";
  $request = $pdo->prepare($sql);
  $request->execute();
  $res = $request->fetchAll(PDO::FETCH_OBJ);

  echo "<table>
<thead>
  <tr>
    <th>Id</th>
    <th>Nom</th>
    <th>Email</th>
  </tr>
</thead>
<tbody>";

  foreach ($res as $user) {
    echo "<tr>
    <td>" . $user->id . "</td>" .
      "<td>" . $user->name . "</td>" .
      "<td>" . $user->email . "</td>
      <td><form method='POST' action='users.php'>
      <input type='hidden' value='" . $user->id . "' name='id_modif'>
      <input type='submit' value='Modifier'></form></td>
      <td><form method='POST' action='users.php'>
      <input type='hidden' value='" . $user->id . "' name='id_suppr'>
      <input type='submit' value='Supprimer'></form></td>
      </tr>";
  }

  echo "</tbody>
</table>";
  //--------------------------------------------------------------------------------------------------

  /*** close the database connection ***/
  $pdo = null;
  ?>

  <br>
  <form method="POST" action="users.php">
    <table>
      <input type="hidden" name="id_input" value=<?php echo $id ?>>
      <tr>
        <td><label>Nom :</label></td>
        <td><input type="text" name="name_input" value=<?php echo $name ?>></td>
      </tr>
      <tr>
        <td><label>Email :</label></td>
        <td><input type="text" name="email_input" value=<?php echo $email ?>></td>
      </tr>
      <tr>
        <td><input type="submit" value=<?php echo $texte_bouton ?>></td>
      </tr>
  </form>
</body>