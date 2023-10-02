<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de entrega</title>
</head>
<body>
    <h1>Cadastro entrega</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $remetente = $_POST["remetente"];
        $codigoped = $_POST["codigoped"];
        $horaped = $_POST["horaped"];
        $destinatario = $_POST["destinatario"];

        $conexao = mysqli_connect("localhost", "root", "", "acaizera");

        if (!$conexao) {
            die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
        }

        $query = "INSERT INTO entregas (remetente, codigoped, horaped, destinatario, statusentrega) VALUES ('$remetente', '$codigoped', '$horaped', '$destinatario', 'Pendente')";
        if (mysqli_query($conexao, $query)) {
            echo "Entrega cadastrada com sucesso!";
        } else {
            echo "Erro ao cadastrar a entrega: " . mysqli_error($conexao);
        }

        $query = "SELECT * FROM entregas";
        $result = mysqli_query($conexao, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Lista de Entregas</h2>";
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
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        Remetente: <input type="text" name="remetente" required><br>
        Código do Pedido: <input type="text" name="codigoped" required><br>
        Hora do Pedido: <input type="time" name="horaped" required><br>
        Destinatário: <input type="text" name="destinatario" required><br>
        Status: <input type="text" name="statusentrega" required><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
