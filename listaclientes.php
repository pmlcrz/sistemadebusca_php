<?php

include "conexao.php";

$sql = "select * from entregas";
$qry = mysqli_query($conexao, $sql);

if (!$qry) {
    die("Erro na consulta: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

</head>
<body>

    <div class="container">

    <h1>Clientes</h1>
    <a href="cadastroclientes.php" class="btn btn-success"> registrar clientes</a>
    <table class="table">
        <tr>
            <th>id</th>
            <th>Cliente</th>
            <th>Data de cadastro</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th colspan=2>Ações</th>
        </tr>
        <?php
        while ($linha = mysqli_fetch_array($qry)) {
           $id = $linha['id'];
           echo "<tr>";
           echo "<td>".$linha['id']."</td>";
           echo "<td>".$linha['cliente']."</td>";
           echo "<td>".$linha['datacadastro']."</td>";
           echo "<td>".$linha['endereco']."</td>";
           echo "<td>".$linha['telefone']."</td>";
           echo "<td><a href='editar.php?id={$id}'>Editar</a></td>";
           echo "<td><a href='deletarentregas.php?id={$id}'>Deletar</a></td>";
           echo "</tr>";
        }
        ?>
    
    </table>
    </div>
    
</body>
</html>
