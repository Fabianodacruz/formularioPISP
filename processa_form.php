<?php
session_start();
// Verifica se o usuário está autenticado
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header("Location: index.php");
    exit;
}

// Recebe e sanitiza os dados do formulário
$nome  = isset($_POST['nome'])  ? trim($_POST['nome'])  : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';

if ($nome == '' || $email == '') {
    echo "Preencha todos os campos.";
    exit;
}

// Define o caminho do arquivo CSV
$arquivo_csv = 'dados.csv';

// Verifica se o arquivo já existe (para inserir cabeçalho somente na primeira vez)
$novo = !file_exists($arquivo_csv);

// Abre o arquivo para escrita (modo "append")
if ($fp = fopen($arquivo_csv, 'a')) {
    if ($novo) {
        // Escreve a linha de cabeçalho
        fputcsv($fp, ['Nome', 'Email', 'Data de Registro']);
    }
    $data = date("Y-m-d H:i:s");
    // Escreve a linha com os dados
    fputcsv($fp, [$nome, $email, $data]);
    fclose($fp);
    echo "Dados salvos com sucesso!";
} else {
    echo "Não foi possível abrir o arquivo para escrita.";
}
?>
