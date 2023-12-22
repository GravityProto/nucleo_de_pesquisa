<?php
// conectar ao banco de dados
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

// Checar formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os inputs
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    // Pegar da database
    $sql = "SELECT * FROM usuario WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();


    // Verificar senha
    if ($user && password_verify($senha, $user['senha'])) {
        echo "Login Sucedido!";
        header("Location: paginainicial.php");
    } else {
        echo "Login Falho!";
        header( "Refresh:1.5; sistema.php", true, 303);
    }
}   


// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        <input type="submit" value="Login">
    </form>
    <form action="registro.php">
        <input type="submit" value="Registrar Conta" onclick="window.location.href = 'registro.php';">
    </form>
</body>
</html>