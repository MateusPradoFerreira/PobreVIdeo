<?php

if (!isset($_POST['alteraDados'])) {
} else {
    $id = $_POST['alteraDados'];
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $diretor = $_POST['diretor'];
    $premio = $_POST['premio'];
    $duracao = $_POST['duracao'];
    $link_imagem = $_POST['link_imagem'];
    $fk_categoria = $_POST['catt'];

    $DadosEditados = "UPDATE filme
    SET nome = '$nome', ano = '$ano', diretor = '$diretor', premio = '$premio',  duracao = '$duracao', link_imagem = '$link_imagem', fk_categoria = '$fk_categoria'
    WHERE id_filme = '$id'";
    mysqli_query($conexaoSQL, $DadosEditados);

    $ettp = 1;
    $cacet = 'FILME <b>'.$nome.'</b> EDITADO COM SUCESSO!!';
}

?>