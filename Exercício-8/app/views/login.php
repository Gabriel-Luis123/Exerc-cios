<?php


if (isset($_SESSION['user'])) {
    header('Location: index.php?acao=index');
    exit;
}

?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
      body { font-family: Arial, Helvetica, sans-serif; background:#f5f5f5; display:flex; align-items:center; justify-content:center; height:100vh; margin:0; }
      .card { background:#fff; padding:20px; border-radius:8px; box-shadow:0 6px 18px rgba(0,0,0,0.08); width:320px; }
      h2 { margin-top:0; }
      label { display:block; margin-top:10px; font-size:0.9rem; }
      input[type="text"], input[type="password"] { width:100%; padding:8px 10px; margin-top:6px; box-sizing:border-box; border:1px solid #ddd; border-radius:4px; }
      button { margin-top:14px; width:100%; padding:10px; border:0; background:#4CAF50; color:#fff; border-radius:6px; cursor:pointer; font-weight:600; }
      .error { color:#b00020; margin-top:10px; }
      .small { font-size:0.85rem; color:#666; margin-top:8px; display:flex; justify-content:space-between; align-items:center; }
      a { color: #4CAF50; text-decoration:none; }
    </style>
</head>
<body>
  <div class="card">
    <h2>Entrar</h2>


    <form method="post" action="index.php?usuario=logar">
      <label for="username">Usuário</label>
      <input id="username" name="username" type="text" required autocomplete="username" value="<?= isset($username) ? htmlspecialchars($username) : '' ?>">

      <label for="password">Senha</label>
      <input id="password" name="password" type="password" required autocomplete="current-password">

      <button type="submit">Entrar</button>

      <div class="small">
        <span>Conta de teste: <strong>Gabriel / abcdr</strong></span>
        <a href="index.php">Voltar</a>
      </div>
    </form>
  </div>
</body>
</html>
