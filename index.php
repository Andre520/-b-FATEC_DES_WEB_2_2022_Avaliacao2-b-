<?php

require_once('Database.php');

$db = new Database();
$db->connect();

session_start();

if ($_SESSION['loggedin'] == FALSE) {
    header("location: login.php");
}

if (isset($_POST['id_professor']) && isset($_POST['nome']) && isset($_POST['cargo']) && isset($_POST['salario'])) {
    $idprof = $_POST['id_professor'];
    $name = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];
    $db->docente($idprof, $name, $cargo, $salario);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro Professor Fatec</title>
</head>
<body>
    <h1 class="page-title">Professor</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="field">
            <input type="text" class="input" name="id_professor" placeholder="id_professor" required>
        </div>
        <div class="field">
            <input type="text" class="input" name="nome" placeholder="nome" required>
        </div>
        <div class="field">
            <input type="text" class="input" name="cargo" placeholder="cargo" required>
        </div>
        <div class="field">
            <input type="number" class="input" name="salario" placeholder="salario" required>
        </div>
        <div class="field">
            <input type="submit" value="Cadastrar">
        </div>
    </form>

    <a href="professores.php" class="link">Ver todos</a>
    <a href="logout.php" class="link">Fazer logout</a>
</body>
</html>