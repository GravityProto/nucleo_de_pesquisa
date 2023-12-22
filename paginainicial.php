<?php
// FILEPATH: /D:/Banco de dados/Xampp/htdocs/nucleo_de_pesquisa/paginainicial.php

// Sample data for research projects and researchers
$researchProjects = [
    ['id' => 1, 'title' => 'Project 1', 'description' => 'Description of Project 1'],
    ['id' => 2, 'title' => 'Project 2', 'description' => 'Description of Project 2'],
    ['id' => 3, 'title' => 'Project 3', 'description' => 'Description of Project 3'],
];

$researchers = [
    ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
    ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
    ['id' => 3, 'name' => 'David Johnson', 'email' => 'david@example.com'],
];

?>

<!DOCTYPE html>
<html>
<head>
<body>
    <h2>Navigation</h2>
    <button onclick="window.location.href = 'projetos.php';">Projetos de Pesquisa</button>
    <button onclick="window.location.href = 'pesquisadores.php';">Pesquisadores</button>
</body>
</html>
