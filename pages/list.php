<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ma liste – Grocerly</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <header>
      <div class="wrap nav">
        <a href="../index.php" class="logo-text">Grocerly</a>
        <ul class="menu">
          <li><a href="../index.php">Accueil</a></li>
          <li><a href="./list.php" aria-current="page">Ma liste</a></li>
          <li><a href="./login.php">Connexion</a></li>
          <li><a href="./profil.php">Profil</a></li>
        </ul>
        <button id="themeToggle" class="theme-btn" title="Changer de mode">
          🌙
        </button>
      </div>
    </header>

    <main class="wrap">
      <h1 class="page-title">Liste de courses</h1>

      <section class="card">
        <h2 class="section-title">Ajouter un article</h2>
        <form class="row row-end">
          <label class="flex-2"
            >Nom de l’article
            <input
              class="input"
              type="text"
              placeholder="ex : Lait entier"
              required
            />
          </label>
          <label class="flex-1"
            >Quantité
            <input class="input" type="number" min="1" value="1" />
          </label>
          <label class="flex-1"
            >Rayon
            <input class="input" type="text" placeholder="ex : Crèmerie" />
          </label>
          <button class="btn" type="submit">Ajouter</button>
        </form>
        <p class="text-muted mt-8">Champs requis : nom (rayon facultatif).</p>
      </section>

      <section class="card">
        <h2 class="section-title">Vos articles</h2>
        <ul class="list">
          <li class="hint">Aucun article pour le moment (démo).</li>
        </ul>
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
