<?php

include 'conexao.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $conexao = mysqli_connect("localhost", "root", "", "acaizera");

    if (!$conexao) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    $query = "DELETE FROM entregas WHERE id = $id";
    if (mysqli_query($conexao, $query)) {
        echo "Entrega excluída com sucesso!";
    } else {
        echo "Erro ao excluir a entrega: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
} else {
    echo "ID da entrega não fornecido.";
}
?>
