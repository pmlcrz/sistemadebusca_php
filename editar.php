<?php
include 'conexao.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $remetente = $_POST["remetente"];
        $codigoped = $_POST["codigoped"];
        $horaped = $_POST["horaped"];
        $destinatario = $_POST["destinatario"];
        $statusentrega = $_POST["statusentrega"];

        $conexao = mysqli_connect("localhost", "root", "", "acaizera");

        if (!$conexao) {
            die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
        }

        $query = "UPDATE entregas SET remetente = '$remetente', codigoped = '$codigoped', horaped = '$horaped', destinatario = '$destinatario', statusentrega = '$statusentrega' WHERE id = $id";
        if (mysqli_query($conexao, $query)) {
            echo "Atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a entrega: " . mysqli_error($conexao);
        }

        mysqli_close($conexao);
    } else {
        $conexao = mysqli_connect("localhost", "root", "", "acaizera");

        if (!$conexao) {
            die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM entregas WHERE id = $id";
        $result = mysqli_query($conexao, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>

            <!DOCTYPE html>
            <html>
            <head>
                <title>Editar Entrega</title>
            </head>
            <body>
                <h1>Editar Entrega</h1>

                <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id=" . $id; ?>">
                    Remetente: <input type="text" name="remetente" value="<?php echo $row['remetente']; ?>" required><br>
                    Código do Pedido: <input type="text" name="codigoped" value="<?php echo $row['codigoped']; ?>" required><br>
                    Hora do Pedido: <input type="time" name="horaped" value="<?php echo $row['horaped']; ?>" required><br>
                    Destinatário: <input type="text" name="destinatario" value="<?php echo $row['destinatario']; ?>" required><br>
                    Status da Entrega: <input type="text" name="statusentrega" value="<?php echo $row['statusentrega']; ?>" required><br>
                    <input type="submit" value="Atualizar">
                </form>
            </body>
            </html>

            <?php
        } else {
            echo "Nenhuma entrega encontrada com o ID fornecido.";
        }

        mysqli_close($conexao);
    }
} else {
    echo "ID da entrega não fornecido.";
}
?>
