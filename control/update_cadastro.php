<?php
session_start();
include_once('../conn/conn.php');
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];

$verifica = mysqli_query($conn, "SELECT email_usuario, celular_usuario FROM usuario  WHERE email_usuario = '$email' OR celular_usuario = '$celular'");
$dados = mysqli_fetch_assoc($verifica);
/*
if ( $email == $dados['email_usuario']){
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
        O <b>email</b> que estás tentando alterar já existe!
        </div>'; 
        header("Location: ../index.php");
}


elseif( $celular == $dados['celular_usuario']){
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
        O <b>celular</b> que estás tentando alterar já existe!
        </div>'; 
        header("Location: ../index.php");

}

else{*/
$query = "UPDATE usuario SET nom_usuario='$nome', email_usuario='$email', celular_usuario='$celular', id_estado='$estado', id_cidade='$cidade' WHERE id_usuario = '$id'";
if(mysqli_query($conn, $query)){
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
    As informações de <em>'.$nome.'</em> foram alteradas com sucesso!
  </div>';
  header("Location: ../index.php");
}

else{
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
    Não foi possível alterar as informações! Email ou celular estão vinculados a outro usuário.
  </div>';
  header("Location: ../index.php");

}



?>
