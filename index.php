<?php
session_start();

// Example: Set the theme from the session if needed
// $_SESSION['theme'] = "dark-mode"; // Uncomment if you want to force dark mode
$themeClass = $_SESSION['theme'] ?? '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Accueil – Grocerly</title>
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body class="index-page <?php echo $themeClass; ?>">

<header>
  <div class="wrap nav">
    <a href="index.php" class="logo-text">Grocerly</a>
    <ul class="menu">
      <li><a href="index.php" aria-current="page">Accueil</a></li>
      <li><a href="pages/list.php">Ma liste</a></li>
      <li><a href="pages/login.php">Connexion</a></li>
      <li><a href="pages/profil.php">Profil</a></li>
    </ul>
    <button id="themeToggle" class="theme-btn" title="Changer de mode">🌙</button>
  </div>
</header>

<main class="hero">
  <div class="wrap">
    <h1>Des courses simples et rapides</h1>
    <p>Crée ta liste de courses et organise tes repas en quelques clics.</p>
    <div class="search">
      <input class="input" type="text" placeholder="Saisis un produit ou un rayon..." />
      <button class="btn" type="button">Rechercher</button>
    </div>
  </div>
</main>

<footer>
  <div class="wrap">
    <small>© <span id="year"></span> Grocerly – Projet étudiant</small>
  </div>
</footer>

<script src="assets/js/script.js"></script>
</body>
</html>
