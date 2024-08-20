<?php
$login = ''; // Inicializando a variável
$password = '';
$mensagem = '';

if (!empty($_POST['login']) && !empty($_POST['password'])) {
  $login = htmlspecialchars($_POST['login']);
  $password = htmlspecialchars($_POST['password']);

  if ($login == 'admin' && $password == 'admin') {
    $mensagem = "<p class='success animate__animated animate__fadeIn'>Login efetuado com sucesso!</p>";
  } else {
    $mensagem = "<p class='error animate__animated animate__shakeX'>Login ou senha inválidos!</p>";
  }
} else {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mensagem = "<p class='error animate__animated animate__shakeX'>Preencha todos os campos!</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Login</title>
  <!-- Link para a Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <style>
    /* Reset básico */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(45deg, #6a11cb, #2575fc);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
      padding: 20px;
    }

    .container {
      background: rgba(255, 255, 255, 0.1);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      max-width: 100%;
      width: 100%;
      max-width: 400px;
      backdrop-filter: blur(10px);
      transition: transform 0.5s ease, box-shadow 0.5s ease;
    }

    .container:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #fff;
      font-weight: 700;
      letter-spacing: 1px;
      animation: fadeInDown 1s ease both;
    }

    .form-group {
      margin-bottom: 20px;
      position: relative;
      animation: fadeInUp 1s ease both;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #fff;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      outline: none;
      transition: background 0.3s, box-shadow 0.3s;
    }

    .form-group input:focus {
      background: rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    }

    .form-group input[type="submit"] {
      background: linear-gradient(45deg, #ff6a00, #ee0979);
      color: white;
      cursor: pointer;
      transition: background 0.4s, transform 0.3s;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .form-group input[type="submit"]:hover {
      background: linear-gradient(45deg, #ee0979, #ff6a00);
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(255, 106, 0, 0.5);
    }

    .message {
      margin-top: 20px;
      text-align: center;
      font-size: 16px;
      font-weight: bold;
    }

    .error {
      color: #ff6a6a;
    }

    .success {
      color: #99e6b3;
    }

    /* Animações customizadas */
    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInDown {
      0% {
        opacity: 0;
        transform: translateY(-20px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsividade */
    @media (max-width: 768px) {
      .container {
        padding: 20px;
      }

      .form-group input {
        padding: 8px;
        font-size: 14px;
      }

      .form-group input[type="submit"] {
        padding: 10px;
        font-size: 14px;
      }

      .message {
        font-size: 14px;
      }
    }

    @media (max-width: 480px) {
      .container {
        padding: 15px;
      }

      .form-group input {
        padding: 7px;
        font-size: 12px;
      }

      .form-group input[type="submit"] {
        padding: 8px;
        font-size: 12px;
      }

      .message {
        font-size: 12px;
      }
    }
  </style>
</head>

<body>
  <div class="container animate__animated animate__fadeInUp">
    <h2>Formulário de Login</h2>
    <form action="formulario_simples.php" method="POST">
      <div class="form-group">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" placeholder="Digite seu login" value="<?= htmlspecialchars($login) ?? ''; ?>" />
      </div>
      <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" placeholder="Digite sua senha" value="<?= htmlspecialchars($password) ?? ''; ?>" />
      </div>
      <div class="form-group">
        <input type="submit" value="Enviar" />
      </div>
      <div class="message">
        <?php echo ($_SERVER['REQUEST_METHOD'] == 'POST') ? $mensagem : ''; ?>
      </div>
    </form>
  </div>
</body>

</html>
