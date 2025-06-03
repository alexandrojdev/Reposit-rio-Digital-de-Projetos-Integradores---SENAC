<?php
require_once 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipoCurso = $_POST['tipoCurso'] ?? '';
    $curso = $_POST['curso'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $membros = $_POST['membros'] ?? '';
    $matriculaProfessor = $_POST['matriculaProfessor'] ?? '';
    $dataPI = $_POST['dataPI'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    try {
        // Salva o projeto na tabela projetos
        $stmt = $pdo->prepare("INSERT INTO projetos (tipo_curso, curso, titulo, membros, matricula_professor, data_pi, descricao)
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $tipoCurso,
            $curso,
            $titulo,
            $membros,
            $matriculaProfessor,
            $dataPI,
            $descricao
        ]);

        $projetoId = $pdo->lastInsertId(); // ID do projeto inserido

        // Pasta de destino para os arquivos
        $pastaDestino = "../Uploads/";
        if (!is_dir($pastaDestino)) {
            mkdir($pastaDestino, 0777, true);
        }

        // Processa os arquivos enviados
        foreach ($_FILES['arquivos']['tmp_name'] as $index => $tmpName) {
            if ($_FILES['arquivos']['error'][$index] === 0) {
                $nomeOriginal = basename($_FILES['arquivos']['name'][$index]);
                $caminhoFinal = $pastaDestino . uniqid() . "_" . $nomeOriginal;

                move_uploaded_file($tmpName, $caminhoFinal);

                // Salva o nome e caminho no banco
                $stmtArquivo = $pdo->prepare("INSERT INTO arquivos_pi (projeto_id, nome_arquivo, caminho_arquivo) VALUES (?, ?, ?)");
                $stmtArquivo->execute([$projetoId, $nomeOriginal, $caminhoFinal]);
            }
        }

        echo "Projeto Integrador e arquivos salvos com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao salvar: " . $e->getMessage();
    }
}
?>
