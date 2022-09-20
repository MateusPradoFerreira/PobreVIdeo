<?php
include('sistema/conection.php');

if (!isset($_POST['add_nome_cat_bnt'])) {
} else {
    $nome = $_POST['add_nome_cat'];

    $DadosEnviado = "insert into categoria (nome_categoria) value ('$nome')";
    mysqli_query($conexaoSQL, $DadosEnviado);
    $ett = 1;
    $cacet = 'CATEGORIA CADASTRADA COM SUCESSO!!';
}

if (!isset($_POST['evn'])) {
} else {
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $diretor = $_POST['diretor'];
    $premio = $_POST['premio'];
    $duracao = $_POST['duracao'];
    $link_imagem = $_POST['link_imagem'];
    $catt = $_POST['catt'];

    $DadosEnviado = "insert into filme (nome, ano, diretor, premio, link_imagem, duracao, fk_categoria) 
    value ('$nome', '$ano', '$diretor', '$premio', '$link_imagem', '$duracao', '$catt')";
    mysqli_query($conexaoSQL, $DadosEnviado);
    $ett = 1;
    $cacet = 'FILME CADASTRADO COM SUCESSO!!';
}
?>

