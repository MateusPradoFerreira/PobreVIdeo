<?php
include('sistema/conection.php');

$ett = 0;
$ettp = 0;

include('sistema/editar.php');
include('sistema/adicionar.php');
include('sistema/delete.php');

if (!isset($_GET['busca'])) {
    $DadosRcebidos = "select * from filme order by nome";
} else {
    $pesquisa = $_GET['buscatx'];
    $ano = intval($_GET['ano']);
    $DadosRcebidos = "select * from filme inner join categoria ON filme.fk_categoria = categoria.id_categoria where nome like '%$pesquisa%' and ano like '%$ano%' or nome_categoria like '%$pesquisa%' and ano like '%$ano%' order by nome";
}

$result_query = mysqli_query($conexaoSQL, $DadosRcebidos);

$categorias = "select *  from categoria where id_categoria > 1 order by nome_categoria";
$categorias_query = mysqli_query($conexaoSQL, $categorias);

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
    <header>
        <div class="row">
            <div class="col-2">
                <img src="imagens/pobre video.png" alt="" class="logo">
            </div>
            <div class="col-10">
                <nav>
                    <ul class="menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="editar.php">Editar Filmes</a></li>
                        <li><a href="perfil.html">Perfil</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <?php
    if ($ett == 1) {
    ?>
        <section id="ass_aviso" class="line-box" style="padding-bottom: 0;">
            <div class="row">
                <div class="col-12">
                    <div class="aviso_scss">
                        <p><?php echo $cacet; ?></p>
                        <button onclick="avs_add_remov('ass_aviso')" class="sub">X</button>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    ?>

    <?php
    if ($ettp == 1) {
    ?>
        <section id="ass_aviso" class="line-box" style="padding-bottom: 0;">
            <div class="row">
                <div class="col-12">
                    <div class="aviso_eddt">
                        <p><?php echo $cacet; ?></p>
                        <button onclick="avs_add_remov('ass_aviso')" class="sub">X</button>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    ?>

    <section class="line-box">
        <div class="row">
            <div class="col-3">
                <a href="adicionar.php"><button style="margin-top: 10px; margin-bottom: 15px" class="bntEDDcat">+ ADICIONAR FILME</button></a>
                <div class="box-row-edd">
                    <h5>Categorias</h5>
                    <?php
                    if (mysqli_num_rows($categorias_query) > 0) {
                        while ($cat = mysqli_fetch_assoc($categorias_query)) {
                    ?>
                            <div class="cat">
                                <p><?= $cat['nome_categoria'] ?></p>
                                <form action="" method="POST"><button value="<?= $cat['id_categoria'] ?>" name="bnt_exc_cat"> X </button></form>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <div class="form-blabla" id="cat-form">
                        <form action="" method="post">
                            <input type="text" name="add_nome_cat" id="inp_cat" placeholder="Nome da Categoria" required>
                            <button onclick="bnt_event_qc('cat-form')" name="add_nome_cat_bnt" type="submit" class="bntEDDcat">CONFIRMAR</button>
                            <button onclick="bnt_event_qc('cat-form')" class="bntCACcat" style="margin-top: 10px;">CANCELAR</button>
                        </form>
                    </div>
                    <button style="margin-top: 5px;" class="bntEDDcat" onclick="bnt_event_add('cat-form')" id="adicionar_cat">+ ADICIONAR</button>
                </div>

            </div>
            <div class="col-9">

                <form action="">
                    <form action="">
                        <div class="busca">
                            <input placeholder="Busque por filmes ou categorias ..." value="<?php if (!isset($_GET['busca'])) {
                                                                                            } else {
                                                                                                echo $pesquisa;
                                                                                            } ?>" type="text" name="buscatx">
                            <button name="busca" type="submit">Buscar</button>
                            <img src="imagens/rl.png" alt="">
                            <select name="ano" id="">
                                <option value="">---</option>
                                <?php
                                if (mysqli_num_rows($result_query) > 0) {
                                    $ddd = "select DISTINCT ano from filme order by ano";
                                    $rr = mysqli_query($conexaoSQL, $ddd);
                                    while ($dd = mysqli_fetch_assoc($rr)) {
                                ?>
                                        <option value="<?= $dd['ano'] ?>"><?= $dd['ano'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>

                        </div>
                    </form>
                </form>

                <?php

                if (mysqli_num_rows($result_query) > 0) {
                    while ($linha = mysqli_fetch_assoc($result_query)) {
                ?>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-4">
                                <img style="background-color: #0288d1;" src="<?= $linha['link_imagem'] ?>" alt="">
                            </div>
                            <div class="col-5">
                                <div class="cont">
                                    <h5><?= $linha['nome'] ?></h5>
                                    <p>Diretor: <?= $linha['diretor'] ?></p>
                                    <p>Premio: <?= $linha['premio'] ?></p>
                                    <p>Duração: <?= $linha['duracao'] ?></p>
                                    <h6><?= $linha['ano'] ?></h6>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="boxBNT">
                                    <form action="editar_filme.php" method="post">
                                        <button class="bntEDD" name="edd" value="<?= $linha['id_filme'] ?>">EDITAR</button>
                                    </form>
                                    <button onclick="modal_acep_abb<?= $linha['id_filme'] ?>('modalAcept<?= $linha['id_filme'] ?>')" class="bntDEL">DELETE</button>

                                    <div class="modalBox" id="modalAcept<?= $linha['id_filme'] ?>">
                                        <p>Tem certeza que deseja apagar o filme <b><?= $linha['nome'] ?></b></p>
                                        <form action="" method="post">
                                            <button onclick="modal_acep_rmv<?= $linha['id_filme'] ?>('modalAcept<?= $linha['id_filme'] ?>')" name="del" value="<?= $linha['id_filme'] ?>" type="submit" class="bntEDDcat">CONFIRMAR</button>
                                        </form>
                                        <form action="">
                                            <button onclick="modal_acep_rmv<?= $linha['id_filme'] ?>('modalAcept<?= $linha['id_filme'] ?>')" class="bntCACcat">CANCELAR</button>
                                        </form>
                                    </div>

                                    <script>
                                        function modal_acep_abb<?= $linha['id_filme'] ?>(bb) {
                                            let modal_acep_abb = document.getElementById(bb);

                                            if (typeof inp_cat == 'undefined' || inp_cat === null) {
                                                return;
                                            } else {
                                                modal_acep_abb.style.display = 'Flex'
                                                body.style.overflow = 'hidden'
                                            }
                                        }

                                        function modal_acep_rmv<?= $linha['id_filme'] ?>(bb) {
                                            let modal_acep_rmv = document.getElementById(bb);

                                            if (typeof inp_cat == 'undefined' || inp_cat === null) {
                                                return;
                                            } else {
                                                modal_acep_rmv.style.display = 'none'
                                            }
                                        }
                                    </script>

                                </div>
                            </div>

                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-12">
                            <h2>NENHUM FILME ENCONTRADO!!</h2>
                        </div>
                    </div>
                <?php
                }
                ?>
                <br>

            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-2">
                    <img src="imagens/pobre video.png" alt="" class="logo">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <p><b>Termos e aviso de privacidadeEnvie-nos comentáriosHelp© 1996-2022</b>, Amazon.com, Inc. ou suas afiliadas</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="js.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>