<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Créer un compte – Grocerly</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="wrap">
    <h1>Créer un compte</h1>
    <form id="registerForm">
      <input type="email" id="email" placeholder="Email" required>
      <input type="password" id="password" placeholder="Mot de passe" required>
      <button type="submit">Créer mon compte</button>
    </form>
    <p id="message"></p>
  </div>

  <script>
  const form = document.getElementById('registerForm');
  const msg = document.getElementById('message');
  form.addEventListener('submit', async e => {
    e.preventDefault();
    const res = await fetch('../api/auth.php?action=register', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        email: document.getElementById('email').value,
        password: document.getElementById('password').value
      })
    });
    const data = await res.json();
    msg.textContent = data.message;
    if(res.ok) msg.style.color = 'green';
    else msg.style.color = 'red';
  });
  </script>
</body>
</html>
