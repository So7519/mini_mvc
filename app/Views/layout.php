<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<!-- Définit la langue du document -->
<html lang="fr">
<!-- En-tête du document HTML -->
<head>
    <!-- Déclare l'encodage des caractères -->
    <meta charset="utf-8">
    <!-- Configure le viewport pour les appareils mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Définit le titre de la page avec échappement -->
    <title><?= isset($title) ? htmlspecialchars($title) : 'PSG Store' ?></title>
    <!-- Favicon PSG -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/fr/archive/d/d5/20210918235540%21Logo_PSG_1996.svg" type="image/svg+xml">
    <!-- Lien vers le fichier CSS profil -->
    <link rel="stylesheet" href="/css/profile.css">
    <!-- Lien vers le fichier CSS produits -->
    <link rel="stylesheet" href="/css/products.css">
    <style>
        .profile-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .profile-btn {
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .profile-btn:hover {
            background-color: #218838;
        }
        .logout-btn {
            padding: 8px 15px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            border-bottom: 2px solid #e8ecf1;
        }
        .tab-btn {
            padding: 12px 24px;
            background-color: transparent;
            border: none;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            font-size: 14px;
            font-weight: 700;
            color: #5a6f7f;
            transition: all 0.2s;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        .tab-btn.active {
            color: #DA291C;
            border-bottom-color: #DA291C;
        }
        .tab-btn:hover {
            color: #001f3f;
        }
        .tab-content {
            display: none;
        }
        .tab-content.show {
            display: block;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            display: none;
        }
        .alert.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            display: block;
        }
        .alert.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            display: block;
        }
        header {
            background-color: #001f3f;
            color: white;
            padding: 16px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-bottom: 3px solid #DA291C;
        }
        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 6px;
            align-items: center;
            flex-wrap: wrap;
        }
        header nav a {
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 6px;
            display: inline-block;
            transition: all 0.2s;
            font-size: 14px;
            font-weight: 500;
            border-bottom: 2px solid transparent;
        }
        header nav a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        header nav a.active {
            color: white;
            background-color: rgba(218, 41, 28, 0.3);
            border-bottom-color: #DA291C;
        }
        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        header img {
            height: 48px;
            width: auto;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }
        .profile-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .profile-btn {
            padding: 10px 20px;
            background-color: #DA291C;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.2s;
            text-decoration: none;
        }
        .profile-btn:hover {
            background-color: #c01815;
        }
        .logout-btn {
            padding: 10px 20px;
            background-color: #c01815;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.2s;
        }
        .logout-btn:hover {
            background-color: #a01410;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
        }
        .modal.show {
            display: block;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 30px;
            border: 1px solid #888;
            border-radius: 4px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close-btn:hover {
            color: black;
        }
        .modal h2 {
            margin-top: 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            font-size: 13px;
            color: #001f3f;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d8dce3;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
            color: #333;
            font-family: inherit;
            transition: all 0.25s;
        }
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #DA291C;
            box-shadow: 0 0 0 3px rgba(218, 41, 28, 0.1);
        }
        .form-group button {
            width: 100%;
            padding: 14px;
            background-color: #DA291C;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: all 0.25s;
            box-shadow: 0 2px 8px rgba(218, 41, 28, 0.15);
        }
        .form-group button:hover {
            background-color: #c01815;
            box-shadow: 0 4px 12px rgba(218, 41, 28, 0.25);
        }
        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
        }
        .tab-btn {
            padding: 10px 20px;
            background-color: transparent;
            border: none;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            color: #666;
            transition: all 0.3s;
        }
        .tab-btn.active {
            color: #007bff;
            border-bottom-color: #007bff;
        }
        .tab-content {
            display: none;
        }
        .tab-content.show {
            display: block;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            display: none;
        }
        .alert.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            display: block;
        }
        .alert.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            display: block;
        }
    </style>
</head>
<!-- Corps du document -->
<body>
<?php
// Détermine la page active pour la navigation
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$isHome = ($currentPath === '/');
$isProducts = ($currentPath === '/products' || strpos($currentPath, '/products/show') === 0);
$isProductsCreate = ($currentPath === '/products/create');
$isUsersCreate = ($currentPath === '/users/create');
$isCart = ($currentPath === '/cart');
$isOrders = (strpos($currentPath, '/orders') === 0);
$user_id = $_GET['user_id'] ?? 1; // Par défaut user_id = 1 pour la démo
?>
<!-- En-tête de la page -->
<header>
    <div class="header-container">
        <!-- Logo PSG -->
        <a href="/" style="text-decoration: none; display: flex; align-items: center;">
            <img src="https://upload.wikimedia.org/wikipedia/fr/archive/8/86/20180604160737%21Paris_Saint-Germain_Logo.svg" alt="PSG Logo">
        </a>
        
        <!-- Navigation -->
        <nav style="flex: 1; display: flex; justify-content: center;">
            <ul>
                <li><a href="/" class="<?= $isHome ? 'active' : '' ?>">Accueil</a></li>
                <li><a href="/products" class="<?= $isProducts ? 'active' : '' ?>">Produits</a></li>
                <li><a href="/products/create" class="<?= $isProductsCreate ? 'active' : '' ?>">Ajouter</a></li>
                <li><a href="/cart?user_id=<?= $user_id ?>" class="<?= $isCart ? 'active' : '' ?>">Panier</a></li>
                <li><a href="/orders?user_id=<?= $user_id ?>" class="<?= $isOrders ? 'active' : '' ?>">Commandes</a></li>
            </ul>
        </nav>

        <!-- Profil à droite -->
        <div class="profile-section">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span style="font-size: 14px; font-weight: 500;"><?= htmlspecialchars($_SESSION['user_name'] ?? 'Utilisateur') ?></span>
                <button class="logout-btn" id="logoutBtn">Déconnexion</button>
            <?php else: ?>
                <a href="/profile" class="profile-btn" style="text-decoration: none;">Profil</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<!-- Zone de contenu principal -->
<main>
    <!-- Insère le contenu rendu de la vue -->
    <?= $content ?>
    
</main>

<!-- Fin du corps de la page -->
</body>

<script>
    // Déconnexion
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', async () => {
            try {
                const response = await fetch('/api/logout', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' }
                });

                if (response.ok) {
                    setTimeout(() => location.href = '/', 500);
                }
            } catch (error) {
                console.error('Erreur déconnexion:', error);
            }
        });
    }
</script>

<!-- Fin du document HTML -->
</html>

