<?php
//Configuracao da conexao
$bd_host = "localhost";
$bd_usuario = "root";
$bd_password = "";
$bd_base = "dados_grafico"; //modificar o banco para o nome de sua preferência

//CONEXÃO COM O BANCO
$conexao = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

if (mysqli_connect_errno()) {
    printf("FALHA NA CONEXÃO: %s\n", mysqli_connect_error());

    echo "<script>alert('Erro');</script>";

    exit();
}

if ($result = mysqli_query($conexao,  $bd_base)) {
    $row = mysqli_fetch_row($result);
    printf("PADRÃO DE BANC0 DE DADOS is %s.\n", $row[0]);
    mysqli_free_result($result);

    echo "<script>alert('erro na conexao');</script>";

}

	// echo "<script>alert('conexao bem sucedida');</script>";

?>
