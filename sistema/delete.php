<?php
include('sistema/conection.php');

if (!isset($_POST['del'])) {
} else {
    $idEX = $_POST['del'];

    $DadosExcluidos = "delete from filme where id_filme = '$idEX'";
    mysqli_query($conexaoSQL, $DadosExcluidos);
}

if (!isset($_POST['bnt_exc_cat'])) {
} else {
    $bnt_exc_cat = $_POST['bnt_exc_cat'];

    $DadosRcebidos = "select fk_categoria from filme";
    $result_query = mysqli_query($conexaoSQL, $DadosRcebidos);

    if (mysqli_num_rows($result_query) > 0) {
        while ($linha = mysqli_fetch_assoc($result_query)) {
            $DadosEditados = "UPDATE filme
                SET fk_categoria = 1
                WHERE fk_categoria = '$bnt_exc_cat'";
            mysqli_query($conexaoSQL, $DadosEditados);
        };
    }

    $DadosExcluidos = "delete from categoria where id_categoria = '$bnt_exc_cat'";
    mysqli_query($conexaoSQL, $DadosExcluidos);
}
?>