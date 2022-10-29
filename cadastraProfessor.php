<?php

require_once('Database.php');

$db = new Database();

session_start();

if ($_SESSION['loggedin'] == FALSE) {
    header("location: login.php");
}

if (isset($_POST['id_professore']) && isset($_POST['nome']) && isset($_POST['carga']) && isset($_POST['salario'])) {
    $idtecher = $_POST['idprof'];
    $name = $_POST['name'];
    $carga = $_POST['cargo'];
    $pay = $_POST['salario'];
    $db->professore($idprof, $name, $cargo, $salario);
}

?>