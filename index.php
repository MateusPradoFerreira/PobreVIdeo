<?php
include('sistema/conection.php');

$DadosCategoria = "select * from categoria order by nome_categoria";
$result_DadosCategoria = mysqli_query($conexaoSQL, $DadosCategoria);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
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

    <section class="index-box">

        <div class="ttxt">
            <h1>
                Só na Pobre Video
            </h1>
            <p>
                Na Pobre Video você acha conteúdo original incrível, que não pode ser encontrado em nenhum outro lugar. Filmes, séries, especiais... Todos feitos especialmente para você!
            </p>
        </div>
        <?php
        if (mysqli_num_rows($result_DadosCategoria) > 0) {
            while ($cat = mysqli_fetch_assoc($result_DadosCategoria)) {
                $DadosRcebidos = "select * from filme where fk_categoria = " . $cat['id_categoria']." order by nome";
                $result_query = mysqli_query($conexaoSQL, $DadosRcebidos);
        ?>
                <?php
                if (mysqli_num_rows($result_query) > 0) {
                ?>
                    <h4>
                        <?= $cat['nome_categoria'] ?>
                    </h4>
                    <section class="crd_swiper_box">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <?php
                                while ($linha = mysqli_fetch_assoc($result_query)) {
                                ?>
                                    <div class="swiper-slide ">
                                        <div>
                                            <img style="background-color: #0288d1;" src="<?= $linha['link_imagem'] ?>" alt="">
                                            <div class="infos">
                                                <h5><?= $linha['nome'] ?></h5>
                                                <p>Diretor: <?= $linha['diretor'] ?></p>
                                                <p>Premio: <?= $linha['premio'] ?></p>
                                                <p>Duração: <?= $linha['duracao'] ?></p>
                                                <h6><?= $linha['ano'] ?></h6>
                                                <button>> ASSISTIR</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </section>
        <?php
                }
            }
        }
        ?>
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

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="js.js"></script>

</body>

</html>