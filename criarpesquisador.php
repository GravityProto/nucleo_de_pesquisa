<?php
// FILEPATH: /D:/Banco de dados/Xampp/htdocs/nucleo_de_pesquisa/create_pesquisador.php

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

// Inserir um novo pesquisador no banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "INSERT INTO pesquisadores (nome, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $email);

    if ($stmt->execute()) {
        echo "Pesquisador inserido com sucesso!";
        
        // Redirecionar após a inserção
        header("Location: pesquisadores.php");
        exit();
    } else {
        echo "Erro ao inserir pesquisador: " . $stmt->error;
    }

    $stmt->close();
}

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Núcleo de Pesquisa - Inserir Pesquisador</title>
</head>
<body>
    <h1>Inserir Novo Pesquisador</h1>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nome">Nome do Pesquisador:</label>
        <input type="text" name="nome" required><br><br>

        <label for="email">Email do Pesquisador:</label>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Inserir Pesquisador">
    </form>

    <br>
    <a href="pesquisadores.php">Voltar para a lista de pesquisadores</a>
</body>
</html>
