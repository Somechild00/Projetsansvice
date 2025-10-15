// Grocerly – common script (theme + footer year)
// Compatible avec 2 variantes de bouton :
//  - <button id="themeToggle">🌙</button>  (emoji)
//  - <button id="theme-toggle"><svg id="theme-icon">...</svg></button>  (svg)
document.addEventListener("DOMContentLoaded", () => {
  // Footer year
  const year = document.getElementById("year");
  if (year) year.textContent = new Date().getFullYear();

  const body = document.body;

  // Récupère l'un des deux boutons possibles
  const btn =
    document.getElementById("themeToggle") ||
    document.getElementById("theme-toggle");
  if (!btn) return;

  // Si bouton SVG présent, on récupère le conteneur d’icône
  const icon = document.getElementById("theme-icon");

  // Helpers UI
  const setEmoji = (isDark) => (btn.textContent = isDark ? "☀️" : "🌙");
  const setAttrs = (isDark) => {
    const label = isDark
      ? "Basculer vers le mode clair"
      : "Basculer vers le mode sombre";
    btn.setAttribute("aria-label", label);
    btn.setAttribute("title", label);
  };
  const setSvg = (isDark) => {
    if (!icon) return;
    icon.innerHTML = isDark
      ? `
        <!-- Soleil -->
        <circle cx="12" cy="12" r="5"/>
        <line x1="12" y1="1"  x2="12" y2="3"/>
        <line x1="12" y1="21" x2="12" y2="23"/>
        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
        <line x1="1"  y1="12" x2="3"  y2="12"/>
        <line x1="21" y1="12" x2="23" y2="12"/>
        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
      `
      : `
        <!-- Lune -->
        <path d="M21 12.79A9 9 0 0 1 11.21 3 7 7 0 1 0 21 12.79z"/>
      `;
  };
  const applyUI = (isDark) => {
    if (icon) setSvg(isDark);
    else setEmoji(isDark);
    setAttrs(isDark);
  };

  // Init depuis storage (ou classe déjà sur <body>)
  const saved = localStorage.getItem("theme");
  const startDark =
    saved === "dark" ||
    (saved !== "light" && body.classList.contains("dark-mode"));
  body.classList.toggle("dark-mode", startDark);
  applyUI(startDark);

  // Toggle
  btn.addEventListener("click", () => {
    const nowDark = !body.classList.contains("dark-mode");
    body.classList.toggle("dark-mode", nowDark);
    localStorage.setItem("theme", nowDark ? "dark" : "light");
    applyUI(nowDark);
  });
});
