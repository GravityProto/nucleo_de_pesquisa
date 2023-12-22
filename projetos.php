<?php
// FILEPATH: /D:/Banco de dados/Xampp/htdocs/nucleo_de_pesquisa/projetos.php

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

// Selecionar projetos da tabela com informações de pesquisadores
$sql = "SELECT p.*, GROUP_CONCAT(pe.nome) AS pesquisadores
        FROM projeto p
        LEFT JOIN projeto_pesquisador pp ON p.id_projeto = pp.projeto_id
        LEFT JOIN pesquisadores pe ON pp.pesquisador_id = pe.id_pesquisador
        GROUP BY p.id_projeto";

$result = $conn->query($sql);

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Núcleo de Pesquisa - Projetos</title>
</head>
<body>
    <h1>Projetos de Pesquisa</h1>

    <?php if ($result->num_rows > 0) : ?>
        <ul>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <li>
                    <h2><a href="detalhes_projeto.php?id=<?php echo $row['id_projeto']; ?>"><?php echo $row['titulo']; ?></a></h2>
                    <p><?php echo $row['descricao']; ?></p>
                    <p>Pesquisador Envolvidos: <?php echo $row['pesquisadores']; ?></p>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p>Nenhum projeto encontrado.</p>
    <?php endif; ?>
    <button onclick="window.location.href = 'paginainicial.php';">Voltar</button>
    <button onclick="window.location.href = 'criarprojeto.php';">Criar</button>
    <button onclick="window.location.href = 'atribuir.php';">Atribuir Pesquisador</button>
</body>
</html>

