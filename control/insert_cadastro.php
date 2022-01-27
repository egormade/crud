<?php
session_start();
include_once('../conn/conn.php');

date_default_timezone_set('America/Sao_Paulo');
utf8_encode($data = date('d/m/Y H:i'));


$nome = $_POST['nome'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];

/*$verifica = mysqli_query($conn, "SELECT email_usuario, celular_usuario FROM usuario");*/

$verifica = mysqli_query($conn, "SELECT email_usuario, celular_usuario FROM usuario  WHERE email_usuario = '$email' OR celular_usuario = '$celular'");
$dados = mysqli_fetch_assoc($verifica);


if ( $email == $dados['email_usuario']){
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
        O <b>email</b> cadastrado já existe!
        </div>'; 
        header("Location: ../index.php");

}


elseif( $celular == $dados['celular_usuario']){
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
        O <b>celular</b> cadastrado já existe!
        </div>'; 
        header("Location: ../index.php");

}

else{
    $query = "INSERT INTO usuario (`nom_usuario`, `email_usuario`, `celular_usuario`, `id_cidade`, `id_estado`, `data_cadastro`) VALUES ('$nome', '$email','$celular','$cidade','$estado','$data')";

    if(mysqli_query($conn, $query)){
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
    '.$nome.' cadastrado (a) com sucesso!
  </div>';
  header("Location: ../index.php");
}}


mysqli_error($conn);
mysqli_close($conn);



?>