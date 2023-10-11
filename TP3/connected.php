<?php
/*
$login = "";
$password = "";
if (isset($_GET['login'])) {
    $login = $_GET['login'];
}

if (isset($_GET['password'])) {
    $password = $_GET['password'];
}

if ($login == "" || $password == "") {
    echo "L'un des champs n'a pas été complété.";
} else {
    echo "Login : " . $login . "<br> Mot de passe : " . $password;
}
*/

// on simule une base de données
$users = array(
    // login => password
    'riri' => 'fifi',
    'yoda' => 'maitrejedi'
);
$login = "anonymous";
$errorText = "";
$successfullyLogged = false;
if (isset($_POST['login']) && isset($_POST['password'])) {
    $tryLogin = $_POST['login'];
    $tryPwd = $_POST['password'];
    // si login existe et password correspond
    if (array_key_exists($tryLogin, $users) && $users[$tryLogin] == $tryPwd) {
        $successfullyLogged = true;
        $login = $tryLogin;
    } else
        $errorText = "Erreur de login/password";
} else
    $errorText = "Merci d'utiliser le formulaire de login";
if (!$successfullyLogged) {
    echo $errorText;
} else {
    session_start();
    $_SESSION['login'] = $login;
    echo "<h1>Bienvenu " . $_SESSION['login'] . "</h1>";
    echo "<a href=deconnexion.php>Se déconnecter</a>";
}
