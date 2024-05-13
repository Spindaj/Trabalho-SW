<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Despesas - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>  

    <?php
        
        
        require "conexao.php";
        $idfornecedor = $_REQUEST["idfornecedor"];
        $sql = "SELECT * FROM TBFornecedor WHERE idfornecedor='$idfornecedor'";
        $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        $linha = mysqli_fetch_array($resultado);

        $idfornecedor = $linha["idfornecedor"];
        $nome = $linha["nome"];
        $cidade = $linha["cidade"];
        $cnpj = $linha["cnpj"];
        $situacao = $linha["situacao"];

        echo "<form name='login' method='post' action='' class='container form-floating' id='cadastro'>";
        echo "<center><h2>CADASTRAR FORNECEDOR</h2></center>";
        echo "<br>";
        echo "<div class='form-floating mb-3'>";
            echo "<input type='text' name='idfornecedor' value='$idfornecedor' size='50' maxlenght='30' class='form-control'  id='floatingInput' placeholder='name@example.com' required>";
            echo "<label for='floatingInput'>ID</label>";
        echo "</div>";
        echo "<div class='form-floating mb-3'>";
            echo "<input type='text' name='nome' value='$nome' size='50' maxlenght='30' class='form-control' id='floatingInput' placeholder='name@example.com' required>";
            echo "<label for='floatingInput'>Nome</label>";
        echo "</div>";
        echo "<div class='form-floating mb-3'>";
            echo "<input type='text' name='cidade' value='$cidade' size='30'  maxlenght='60' class='form-control' id='cidade' placeholder='Cidade' required>";
            echo "<label for='cidade'>Cidade</label>";
        echo "</div>";
        echo "<div class='form-floating mb-3'>";
            echo "<input type='text' name='cnpj' value='$cnpj' size='30' maxlenght='20' class='form-control' id='cnpj' placeholder='CNPJ' required>";
            echo "<label for='cnpj'>CNPJ</label>";
        echo "</div>";
            echo "<input type='submit' name='salvar' value='Salvar' class='btn btn-primary'>";


        if (isset($_POST["salvar"])) {
            $nome = $_POST["nome"];
            $cidade = $_POST["cidade"];
            $cnpj = $_POST["cnpj"];

            require "conexao.php";
            $sql = "UPDATE TBFornecedor SET nome='$nome', cidade='$cidade', cnpj='$cnpj' WHERE idfornecedor='$idfornecedor'";
            mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
            echo "<script type =\"text/javascript\">alert('Fornecedor editado com sucesso!');</script>";
            echo "<a href='pesquisar.php' class='btn btn-danger'>Voltar</a>";
        }       
        echo "</form>";
    ?>
</body>
</html>