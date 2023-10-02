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
    <title>Registros</title>

</head>
<body>

    <div class="container">

    <h1>Entregas</h1>
    <a href="cadastroentregas.php" class="btn btn-success"> registrar</a>
    <table class="table">
        <tr>
            <th>id</th>
            <th>Remetente</th>
            <th>Código pedido</th>
            <th>Hora pedido</th>
            <th>Destinatário</th>
            <th>Status</th>
            <th colspan=2>Ações</th>
        </tr>
        <?php
        while ($linha = mysqli_fetch_array($qry)) {
           $id = $linha['id'];
           echo "<tr>";
           echo "<td>".$linha['id']."</td>";
           echo "<td>".$linha['remetente']."</td>";
           echo "<td>".$linha['codigoped']."</td>";
           echo "<td>".$linha['horaped']."</td>";
           echo "<td>".$linha['destinatario']."</td>";
           echo "<td>".$linha['statusentrega']."</td>";
           echo "<td><a href='editar.php?id={$id}'>Editar</a></td>";
           echo "<td><a href='deletarentregas.php?id={$id}'>Deletar</a></td>";
           echo "</tr>";
        }
        ?>
    
    </table>
    </div>
    
</body>
</html>
