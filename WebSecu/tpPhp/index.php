<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!--  Pour forcer le vidage du cache du navigateur -->
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div>
        <h2 class="intro">Connexion</h2>
        <form action="login_action.php" method="POST" id="login-form">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" required class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Se connecter</button>
        </form>
        <div class="text-center mt-4">
            <a href="signup.php" class="text-blue-500">Pas encore inscrit ? Créer un compte</a>
        </div>
    </div>
</body>
</html>