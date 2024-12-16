<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de compte</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-semibold text-center mb-6">Créer un compte</h2>
        <form action="signup_action.php" method="POST" id="signup-form">
            <div class="mb-4">
                <label for="first-name" class="block text-sm font-medium text-gray-700">Prénom</label>
                <input type="text" id="first-name" name="prenom" required class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <div class="mb-4">
                <label for="last-name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" id="last-name" name="nom" required class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <div class="mb-4">
                <label for="dob" class="block text-sm font-medium text-gray-700">Date de naissance</label>
                <input type="date" id="dob" name="dob" required class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Genre</label>
                <select id="gender" name="gender" class="w-full p-2 border border-gray-300 rounded mt-1">
                    <option value="male">Homme</option>
                    <option value="female">Femme</option>
                    <option value="other">Autre</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" required class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded hover:bg-blue-600">S'inscrire</button>

            <div class="text-center mt-4">
                <a href="index.php" class="text-blue-500">Vous avez déjà un compte ?</a>
            </div>
        </form>
    </div>
</body>
</html>
