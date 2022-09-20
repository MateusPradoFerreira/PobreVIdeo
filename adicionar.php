<?php
include('sistema/conection.php');


$DadosRcebidos = "select *  from filme";
$result_query = mysqli_query($conexaoSQL, $DadosRcebidos);

$DadosCategoria = "select *  from categoria order by nome_categoria";
$result_DadosCategoria = mysqli_query($conexaoSQL, $DadosCategoria);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style copy.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="tt">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <img class="iimgg" src="imagens/film.png" alt="">
            </div>
            <div class="col-6">
                <div class="pp">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <img src="imagens/pobre video 2.png" alt="" class="logoll">
                        </div>
                    </div>
                    <form action="editar.php" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="inppp">
                                    <img src="imagens/nome.png" alt="">
                                    <input class="ipt" name="nome" type="text" placeholder="Nome do filme" required maxlength="45">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="inppp">
                                    <img src="imagens/ano.png" alt="">
                                    <input class="ipt" name="ano" type="number" placeholder="Ano" required maxlength="4">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="inppp">
                                    <img src="imagens/hora.png" alt="">
                                    <input class="ipt" name="duracao" type="time" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="inppp">
                                    <img src="imagens/diretor.png" alt="">
                                    <input class="ipt" name="diretor" type="text" placeholder="Diretor do filme" required maxlength="45">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="inppp">
                                    <img src="imagens/premio.png" alt="">
                                    <input class="ipt" name="premio" type="text" placeholder="Prêmio" required maxlength="45">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="inppp">
                                    <img src="imagens/img.png" alt="">
                                    <input class="ipt" name="link_imagem" type="text" placeholder="Link da magem" required maxlength="500">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="inppp">
                                    <img src="imagens/cat.png" alt="">
                                    <select class="sct" name="catt">
                                        <option value="1">-----</option>
                                        <?php if (mysqli_num_rows($result_DadosCategoria) > 0) {
                                            while ($dados = mysqli_fetch_assoc($result_DadosCategoria)) {
                                        ?>
                                                <option value="<?= $dados['id_categoria'] ?>"><?= $dados['nome_categoria'] ?></option>
                                        <?php
                                            }
                                        } ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <br>
                                <button type="submit" class="bntEDDcat" name="evn">CADASTAR</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <a href="editar.php"><button class="bntCACcat" style="margin-top: 5px;">CANCELAR</button></a>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>