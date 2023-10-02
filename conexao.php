<?php

//$servidor = 'localhost';
//$usuario = 'root';
//$senha = '';
//$db = 'acaizera';

//$con = mysqli_connect('localhost',$usuario,$senha,$db); 


$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "acaizera";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
