<?php
require_once('config.php');
$connectionString = "mysql:host=" . _MYSQL_HOST;
if (defined('_MYSQL_PORT'))
    $connectionString .= ";port=" . _MYSQL_PORT;
$connectionString .= ";dbname=" . _MYSQL_DBNAME;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$pdo = NULL;
try {
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
}
$sql = "SELECT * FROM users";
$request = $pdo->prepare($sql);
// TODO: add your code here
// retrieve data from database using fetch(PDO::FETCH_OBJ) and
// display them in HTML array

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
    echo "<tr><td>" . $user->id . "</td>" .
        "<td>" . $user->name . "</td>" .
        "<td>" . $user->email . "</td></tr>";
}

echo "</tbody>
</table>";


/*** close the database connection ***/
$pdo = null;
