openapi: 3.0.0
info:
  title: API Utilisateurs
  version: 1.0.0
paths:
  /users:
    get:
      summary: Récupérer tous les utilisateurs
      responses:
        '200':
          description: Succès
          content:
            application/json:
              example: []
    post:
      summary: Créer un nouvel utilisateur
      requestBody:
        required: true
        content:
          application/json:
            example: {"name": "John Doe", "email": "john.doe@example.com"}
      responses:
        '201':
          description: Création réussie
          content:
            application/json:
              example: {"id": 1}
        '400':
          description: Données incomplètes
  /users/{userId}:
    parameters:
      - name: userId
        in: path
        required: true
        description: ID de l'utilisateur à manipuler
        schema:
          type: integer
    get:
      summary: Récupérer un utilisateur par son ID
      responses:
        '200':
          description: Succès
          content:
            application/json:
              example: {"id": 1, "name": "John Doe", "email": "john.doe@example.com"}
        '404':
          description: Utilisateur non trouvé
    put:
      summary: Mettre à jour un utilisateur par son ID
      requestBody:
        required: true
        content:
          application/json:
            example: {"name": "Nouveau Nom", "email": "nouveau.nom@example.com"}
      responses:
        '200':
          description: Mise à jour réussie
          content:
            application/json:
              example: {"id": 1}
        '400':
          description: Données incomplètes
        '404':
          description: Utilisateur non trouvé
    delete:
      summary: Supprimer un utilisateur par son ID
      responses:
        '204':
          description: Suppression réussie
        '404':
          description: Utilisateur non trouvé
