<?php
// FILEPATH: /D:/Banco de dados/Xampp/htdocs/nucleo_de_pesquisa/registro.php

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

// Checar se deu submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pegar data do form
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    $senha = password_hash($senha, PASSWORD_DEFAULT);
    // Inserir data
    $sql = "INSERT INTO usuario (nome, senha) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $senha);

    if ($stmt->execute()) {
        echo "Registro bem-sucedido!";
        header("Location: sistema.php");
    } else {
        echo "Erro ao registrar: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuario</title>
</head>
<body>
    <h2>Registrar Usuario</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="name">Nome:</label>
        <input type="text" name="nome" required><br><br>
        <label for="password">Senha:</label>
        <input type="password" name="senha" required><br><br>
        <input type="submit" value="Register">
    </form>
    <form action="sistema.php">
        <input type="submit" value="Logar na conta" onclick="window.location.href = 'sistema.php';">
    </form>
</body>
</html>
