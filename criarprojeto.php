<?php
// FILEPATH: /D:/Banco de dados/Xampp/htdocs/nucleo_de_pesquisa/create_projeto.php

// Database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "nucleo_de_pesquisa";

// Conexao
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexao
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inserir um novo projeto no banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];

    $sql = "INSERT INTO projeto (titulo, descricao) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $titulo, $descricao);

    if ($stmt->execute()) {
        echo "Projeto criado com sucesso!";
        // Redirecionar para evitar repetição do formulario
        header("Location: projetos.php");
    } else {
        echo "Erro ao criar projeto: " . $stmt->error;
    }

    $stmt->close();
}

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Núcleo de Pesquisa - Criar Projeto</title>
</head>
<body>
    <h1>Criar Novo Projeto</h1>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="titulo">Título do Projeto:</label>
        <input type="text" name="titulo" required><br><br>

        <label for="descricao">Descrição do Projeto:</label>
        <textarea name="descricao" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Criar Projeto">
    </form>

    <br>
    <a href="projetos.php">Voltar para a lista de projetos</a>
</body>
</html>
