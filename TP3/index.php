<head>
    <?php
    if (isset($_GET['css'])) {
        setcookie("idStyle", $_GET['css']);
        echo '<link rel="stylesheet" href="' . $_GET['css'] . '.css">';
    } else if (isset($_COOKIE['idStyle'])) {
        echo '<link rel="stylesheet" href="' . $_COOKIE['idStyle'] . '.css">';
    } else {
        echo '<link rel="stylesheet" href="style0.css">';
    }

    ?>
</head>

<?php
session_start();
if (isset($_SESSION['login'])) {
    echo "Login : " . $_SESSION['login'];
    echo "<br><a href=deconnexion.php>Se déconnecter</a>";
} else {
    echo "non connecté";
}
?>

<form id="style_form" action="index.php" method="GET">
    <select name="css">
        <option value="style1">style1</option>
        <option value="style2">style2</option>
    </select>
    <input type="submit" value="Appliquer" />
</form>