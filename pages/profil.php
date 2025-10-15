<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil – Grocerly</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <header>
      <div class="wrap nav">
        <a href="../index.php" class="logo-text">Grocerly</a>
        <ul class="menu">
          <li><a href="../index.php">Accueil</a></li>
          <li><a href="./list.php">Ma liste</a></li>
          <li><a href="./login.php">Connexion</a></li>
          <li><a href="./profil.php" aria-current="page">Profil</a></li>
        </ul>
        <button id="themeToggle" class="theme-btn" title="Changer de mode">
          🌙
        </button>
      </div>
    </header>

    <main class="wrap">
      <section class="card card-medium">
        <h1 class="mb-10">Mon profil</h1>
        <p><strong>Nom d’utilisateur :</strong> utilisateur_demo</p>
        <p><strong>Email :</strong> demo@grocerly.fr</p>
        <p class="mt-12"><button class="btn">Se déconnecter</button></p>
      </section>
    </main>

    <footer>
      <div class="wrap">
        <small>© <span id="year"></span> Grocerly – Projet étudiant</small>
      </div>
    </footer>

    <script src="../assets/js/index.js"></script>
  </body>
</html>
