<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Entregas</title>
</head>
<body>
    <h1>Listagem de Entregas</h1>

    <?php
    include 'conexao.php';

    $query = "SELECT * FROM entregas";
    $result = mysqli_query($conexao, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row["id"] . "<br>";
            echo "Remetente: " . $row["remetente"] . "<br>";
            echo "Código do Pedido: " . $row["codigoped"] . "<br>";
            echo "Hora do Pedido: " . $row["horaped"] . "<br>";
            echo "Destinatário: " . $row["destinatario"] . "<br>";
            echo "Status: " . $row["statusentrega"] . "<br>";
            echo "<hr>";
        }
    } else {
        echo "Nenhuma entrega cadastrada.";
    }

    mysqli_close($conexao);
    ?>
</body>
</html>
