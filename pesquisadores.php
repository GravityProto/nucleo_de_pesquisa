<!DOCTYPE html>
<html>
<head>
    <title>Pesquisadores</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Pesquisadores</h1>
    <?php
    // Conexão com o banco de dados
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "nucleo_de_pesquisa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Consulta SQL para obter os pesquisadores
    $sql = "SELECT id_pesquisador, nome, email FROM pesquisadores";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibir os dados dos pesquisadores em uma tabela
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Email</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_pesquisador"] . "</td>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum pesquisador encontrado.";
    }

    $conn->close();
    ?>
    <button onclick="window.location.href = 'paginainicial.php';">Voltar</button>
    <button onclick="window.location.href = 'criarpesquisador.php';">Criar</button>
</body>
</html>
