<?php
// FILEPATH: /D:/Banco de dados/Xampp/htdocs/nucleo_de_pesquisa/atribuir_pesquisador_projeto.php

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

// Obter lista de projetos e pesquisadores para seleção
$sql_projetos = "SELECT id_projeto, titulo FROM projeto";
$result_projetos = $conn->query($sql_projetos);

$sql_pesquisadores = "SELECT id_pesquisador, nome FROM pesquisadores";
$result_pesquisadores = $conn->query($sql_pesquisadores);

// Inserir atribuição de pesquisador a projeto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projeto_id = $_POST["projeto_id"];
    $pesquisador_id = $_POST["pesquisador_id"];

    $sql = "INSERT INTO projeto_pesquisador (projeto_id, pesquisador_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $projeto_id, $pesquisador_id);

    if ($stmt->execute()) {
        echo "Pesquisador atribuído ao projeto com sucesso!";
        header("Location: projetos.php");
    } else {
        echo "Erro ao atribuir pesquisador ao projeto: " . $stmt->error;
    }

    $stmt->close();
}

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Núcleo de Pesquisa - Atribuir Pesquisador a Projeto</title>
</head>
<body>
    <h1>Atribuir Pesquisador a Projeto</h1>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="projeto_id">Selecione o Projeto:</label>
        <select name="projeto_id" required>
            <?php
            while ($row = $result_projetos->fetch_assoc()) {
                echo "<option value='" . $row['id_projeto'] . "'>" . $row['titulo'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="pesquisador_id">Selecione o Pesquisador:</label>
        <select name="pesquisador_id" required>
            <?php
            while ($row = $result_pesquisadores->fetch_assoc()) {
                echo "<option value='" . $row['id_pesquisador'] . "'>" . $row['nome'] . "</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" value="Atribuir Pesquisador a Projeto">
    </form>

    <br>
    <a href="projetos.php">Voltar para a lista de projetos</a>
</body>
</html>
