<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion – Grocerly</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <header>
      <div class="wrap nav">
        <a href="../index.php" class="logo-text">Grocerly</a>
        <ul class="menu">
          <li><a href="../index.php">Accueil</a></li>
          <li><a href="./list.php">Ma liste</a></li>
          <li><a href="./login.php" aria-current="page">Connexion</a></li>
          <li><a href="./profil.php">Profil</a></li>
          <li><a href="pages/register.php">Créer un compte</a></li>
        </ul>
        <button id="themeToggle" class="theme-btn" title="Changer de mode">
          🌙
        </button>
      </div>
    </header>

    <main class="wrap">
      <section class="card card-narrow">
        <h1 class="mb-12">Se connecter</h1>

        <form class="stack">
          <label
            >E-mail
            <input
              class="input"
              type="email"
              placeholder="ex : nom@exemple.com"
              required
            />
          </label>
          <label
            >Mot de passe
            <input
              class="input"
              type="password"
              placeholder="Votre mot de passe"
              required
            />
          </label>
          <button class="btn" type="submit">Se connecter</button>
        </form>

        <p class="mt-14 text-muted text-small">
          Pas encore inscrit ?
          <a href="#" class="underline">Créer mon compte</a>
        </p>
      </section>
    </main>

    <footer>
      <div class="wrap">
        <small>© <span id="year"></span> Grocerly – Projet étudiant</small>
      </div>
    </footer>

    <script src="../assets/js/script.js"></script>
  </body>
</html>
