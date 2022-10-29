<?php

class Database {

    public $host;
    public $userDB;
    public $passwordDB;
    public $database;
    public $users;
    public $passwords;

    public function __construct() {
        $this->host = 'localhost';
        $this->userDB = "root";
        $this->passwordDB = "";
        $this->database = "sistema_cadastro";
        $this->users = array();
        $this->passwords = array();
    }
    
    public function connect() {
        $conn = mysqli_connect($this->host, $this->userDB, $this->passwordDB, $this->database);

        if(!$conn) {
            echo "Erro ao conectar.";
        } else {
            return $conn;
            echo "Conexão bem sucedida.";
        }
    }

    function readLogin() {
        try {
            $this->connect();
            $sql = "SELECT * FROM fatec";
            $result = $this->connect()->query($sql);
            if ($result == false) {
                echo "Sem usuários e senhas criados,inseri-los no banco de dados.";
            } else {
                foreach ($result as $index => $row) {
                    $this->users[$index] = $row['usuario'];
                    $this->passwords[$index] = $row['senha'];
                }
            }
        } catch (PDOException $e) {
            echo "Could not read database information.";
        };
        $this->conn = null;
    }

    public function docente($idprof, $nome , $cargo, $salario) {
        $this->connect();
        $sql = "INSERT INTO professor(id_professor, nome, cargo, salario) VALUES ($idprof, '$nome', '$cargo', $salario);";
        // use exec() because no results are returned
        $this->connect()->query($sql);
        echo "To Connect sucesso!";
        $this->conn = null;
    }

    function mostraProfessores() {
        try {
            $this->connect();
            $sql = "SELECT id_professor, nome, cargo, salario FROM professor";
            $result = $this->connect()->query($sql);
            if ($result == false) {
                echo "Ainda não há nenhum funcionario criado!";
            } else {
                foreach ($result as $row) {
                    echo '<p style="margin: 0 30px">' . $row["id_professor"] . " | " . $row['nome'] . " | " . $row['cargo'] . " | " . $row['salario'] . " R$" . "</p><br>";
                }
            }
        } catch (PDOException $e) {
            echo "Could not read database information.";
        };
        $this->conn = null;
    }

}

$db = new Database();

?>