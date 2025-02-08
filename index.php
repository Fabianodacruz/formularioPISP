<?php
session_start();

// Defina a senha correta
$senha_correta = 'minha_senha';  // altere para a senha desejada

// Se o formulário de login foi enviado, verifica a senha
if (isset($_POST['senha'])) {
    if ($_POST['senha'] === $senha_correta) {
        $_SESSION['autenticado'] = true;
    } else {
        $erro = "Senha incorreta!";
    }
}

// Se o usuário não estiver autenticado, mostra o formulário de login
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Área Restrita</title>
    </head>
    <body>
        <h2>Área Restrita</h2>
        <?php if (isset($erro)) { echo "<p style='color:red;'>$erro</p>"; } ?>
        <form method="post">
            <label for="senha">Digite a senha:</label>
            <input type="password" id="senha" name="senha" required>
            <input type="submit" value="Entrar">
        </form>
    </body>
    </html>
    <?php
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro</title>
</head>
<body>
    <h2>Formulário de Cadastro</h2>
    <form action="processa_form.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
