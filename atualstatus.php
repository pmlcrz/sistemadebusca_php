<?php
if (isset($_GET["id"]) && isset($_GET["status"])) {
    $id = $_GET["id"];
    $status = $_GET["status"];

    $conexao = mysqli_connect("localhost", "usuario", "senha", "controle_entregas");

    if (!$conexao) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    $query = "UPDATE entregas SET statusentrega = '$status' WHERE id = $id";
    if (mysqli_query($conexao, $query)) {
        echo "Status da entrega atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o status da entrega: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
} else {
    echo "ID da entrega ou novo status não fornecidos.";
}
?>
