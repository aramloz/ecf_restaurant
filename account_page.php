<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Création compte</title>
</head>
<body>

    <form action="utilisateur_add.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="num_people">Nombre de couverts par défaut:</label>
        <select name="num_people" id="num_people" required>
            <option value="1">1 personne</option>
            <option value="2">2 personnes</option>
            <option value="3">3 personnes</option>
            <option value="4">4 personnes</option>
            <option value="5">5 personnes</option>
            <option value="6">6 personnes</option>
        </select><br>

        <label for="comments">Allergies:</label><br>
        <textarea name="comments" id="comments" rows="4"></textarea><br>

        <button type="submit" name="submit" id="compte_button">Créer compte</button>
    </form>

</body>
</html>