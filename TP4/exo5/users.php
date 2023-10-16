<?php
require_once('../connexion.php');

// Gestion de la requête GET pour récupérer un utilisateur par son ID
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $sql = "SELECT * FROM users WHERE id = :userId";
    $request = $pdo->prepare($sql);
    $request->bindParam(':userId', $userId);
    $request->execute();
    $user = $request->fetch(PDO::FETCH_OBJ);

    if ($user) {
        header('Content-Type: application/json');
        echo json_encode($user);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Utilisateur non trouvé']);
    }
}

// Gestion de la requête PUT pour mettre à jour un utilisateur par son ID
/*curl -X PUT -H "Content-Type: application/json" 
-d "{\"name\":\"John Doe\", \"email\":\"john.doe@example.com\"}" 
http://localhost/IDAW/TP4/exo5/users.php?userId=4
*/ else if ($_SERVER['REQUEST_METHOD'] === 'PUT' && isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $body = json_decode(file_get_contents('php://input'));

    if (!empty($body->name) && !empty($body->email)) {
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :userId";
        $request = $pdo->prepare($sql);
        $request->bindParam(':name', $body->name);
        $request->bindParam(':email', $body->email);
        $request->bindParam(':userId', $userId);
        $request->execute();
        http_response_code(204);
        header('Content-Type: application/json');
        echo json_encode(['id' => $userId]);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Données incomplètes']);
    }
}

// Gestion de la requête DELETE pour supprimer un utilisateur par son ID
//curl -X DELETE http://localhost/IDAW/TP4/exo5/users.php?userId=4
else if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $sql = "DELETE FROM users WHERE id = :userId";
    $request = $pdo->prepare($sql);
    $request->bindParam(':userId', $userId);
    $request->execute();

    if ($request->rowCount() > 0) {
        http_response_code(204);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Utilisateur non trouvé']);
    }
}

// Gestion de la requête GET
else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM users";
    $request = $pdo->prepare($sql);
    $request->execute();
    $res = $request->fetchAll(PDO::FETCH_OBJ);
    header('Content-Type: application/json');
    echo json_encode($res);
}

// Gestion de la requête POST

//curl -X POST -H "Content-Type: application/json" 
//-d "{\"name\":\"John Doe\", \"email\":\"john.doe@example.com\"}" 
//http://localhost/IDAW/TP4/exo5/users.php

else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = json_decode(file_get_contents('php://input'));
    if (!empty($body->name) && !empty($body->email)) {
        $sql = "INSERT INTO users VALUES ('','" . $body->name . "','" . $body->email . "')";
        $request = $pdo->prepare($sql);
        $request->execute();
        $idInsere = $pdo->lastInsertId();
        http_response_code(201);
        header('Content-Type: application/json');
        echo json_encode($idInsere);
    } else {
        http_response_code(400);
    }
}
