<?php
session_start();
include_once('../conn/conn.php');

$id_usuario = $_POST['id'];

$query = "DELETE FROM usuario WHERE id_usuario='$id_usuario'";
$result = mysqli_query($conn, $query) or die('Houve um erro na conexão com o banco');

if(mysqli_query($conn, $query)){
    $_SESSION['msg'] = '<div class="alert alert-sucess" role="alert">
    Sucesso!
    </div>';
  header("Location: ../index.php");}

  else{
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
    House um erro, por favor entrar em contato com o suporte!
    </div>';
  header("Location: ../index.php");}

  mysqli_close($conn);
?>



