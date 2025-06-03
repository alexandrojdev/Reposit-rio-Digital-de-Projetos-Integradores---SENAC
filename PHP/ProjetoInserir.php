<?php
require_once 'Database.php';

class ProjetoInserir {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function inserir($tipoCurso, $curso, $titulo, $membros, $matriculaProfessor, $dataPI, $descricao) {
        try {
            $sql = "INSERT INTO projetos (tipo_curso, curso, titulo, membros, matricula_professor, data_pi, descricao)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $tipoCurso,
                $curso,
                $titulo,
                $membros,
                $matriculaProfessor,
                $dataPI,
                $descricao
            ]);

            echo "Projeto inserido com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao inserir: " . $e->getMessage();
        }
    }
}

// Exemplo de uso:
// $pi = new ProjetoInserir();
// $pi->inserir("Técnico", "Técnico em Desenvolvimento de Sistemas", "Sistema Web", "João, Maria", "123456", "2025-06-10", "Sistema de gestão de projetos");
?>

