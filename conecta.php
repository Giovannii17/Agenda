<?php

$hostname = "localhost";
$user = "dupqktbg_agenda";
$senha = "gh44bGLdZ4HFuudZCuEv";
$bd = "dupqktbg_agenda";

$conexao = mysqli_connect($hostname,$user,$senha,$bd);

if (!$conexao){
    die("Falha na conexão com o banco de dados:" . mysqli_connect_error());
}

$nomeusr = mysqli_real_escape_string($conexao, $_POST['nomeusr']);
$senhausr = mysqli_real_escape_string($conexao, $_POST['senhausr']);

$sql = "SELECT codusr, nomeusr, senhausr FROM usuarios WHERE nomeusr = '$nomeusr' AND senhausr = '$senhausr'";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0){
    session_start();
    $_SESSION['nomeusr'] = $nomeusr;
    header("Location: agenda.html");
    exit();
} else{
    echo"<p>Senha Incorreta!</p>";
}
mysqli_close($conexao);
?>