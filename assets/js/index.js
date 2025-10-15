// Selection of the elements involved in the theme toggle
const themeToggle = document.getElementById("theme-toggle");
const themeIcon = document.getElementById("theme-icon");

// Verification of the saved theme
const savedTheme = localStorage.getItem("theme");

if (savedTheme === "dark") {
  document.body.classList.add("dark-mode");
  themeToggle.setAttribute("aria-label", "Basculer vers le mode clair");
  themeToggle.setAttribute("title", "Basculer vers le mode clair");
} else if (savedTheme === "light") {
  document.body.classList.remove("dark-mode");
  themeToggle.setAttribute("aria-label", "Basculer vers le mode sombre");
  themeToggle.setAttribute("title", "Basculer vers le mode sombre");
}

// Function to update the icon based on the current theme
function updateIcon(isDark) {
  themeIcon.innerHTML = isDark
    ? `
        <!-- Soleil (mode sombre actif) -->
        <circle cx="12" cy="12" r="5"/>
        <line x1="12" y1="1" x2="12" y2="3"/>
        <line x1="12" y1="21" x2="12" y2="23"/>
        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
        <line x1="1" y1="12" x2="3" y2="12"/>
        <line x1="21" y1="12" x2="23" y2="12"/>
        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
        `
    : `
        <!-- Lune (mode clair actif) -->
        <path d="M21 12.79A9 9 0 0 1 11.21 3 7 7 0 1 0 21 12.79z"/>
        `;
}

// Event listener for the theme toggle button
themeToggle.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");
  const isDarkMode = document.body.classList.contains("dark-mode");

  // update the icon
  updateIcon(isDarkMode);

  // update the aria-label and title
  themeToggle.setAttribute(
    "aria-label",
    isDarkMode ? "Basculer vers le mode clair" : "Basculer vers le mode sombre"
  );
  themeToggle.setAttribute(
    "title",
    isDarkMode ? "Basculer vers le mode clair" : "Basculer vers le mode sombre"
  );

  // save the preference
  localStorage.setItem("theme", isDarkMode ? "dark" : "light");
});

// Initial icon update based on the current theme
updateIcon(document.body.classList.contains("dark-mode"));
