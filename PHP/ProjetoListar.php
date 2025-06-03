<?php
require_once 'Database.php';

class ProjetoListar {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function listarTodos() {
        $sql = "SELECT * FROM projetos ORDER BY data_cadastro DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Geração do HTML
$listar = new ProjetoListar();
$projetos = $listar->listarTodos();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Projetos Integradores</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Projetos Integradores Cadastrados</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Curso</th>
                <th>Curso</th>
                <th>Título</th>
                <th>Membros</th>
                <th>Matrícula Prof.</th>
                <th>Data do PI</th>
                <th>Descrição</th>
                <th>Data de Cadastro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projetos as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= $p['tipo_curso'] ?></td>
                    <td><?= $p['curso'] ?></td>
                    <td><?= $p['titulo'] ?></td>
                    <td><?= $p['membros'] ?></td>
                    <td><?= $p['matricula_professor'] ?></td>
                    <td><?= date('d/m/Y', strtotime($p['data_pi'])) ?></td>
                    <td><?= $p['descricao'] ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($p['data_cadastro'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
