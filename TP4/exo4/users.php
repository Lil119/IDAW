<?php
require_once('../connexion.php');

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
