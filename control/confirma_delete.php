<?php
session_start();
include_once('../conn/conn.php');
?>

<!doctype html>
<html>
<head>
<!-- Required meta tags -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8_general_ci">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Personal CSS -->
<link rel="stylesheet"  href="../css/style.css" >
    
<!-- Bootstrap CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet" >
<link href="../css/bootstrap.css" rel="stylesheet" >

<!-- JavaScript 
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/funcoes.js"></script>-->


<title>Cadastro de Pessoas</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-12">

<h2><strong>Confirmação de Exclusão</strong></h2>
<p><em>Verifique as informações</em> abaixo antes de confirmar a exclusão.</p>


<form action="delete_cadastro.php" method="POST">

<?php
$id_usuario = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM usuario 
INNER JOIN estado ON usuario.id_estado = estado.id_estado 
INNER JOIN cidade ON usuario.id_cidade = cidade.id_cidade WHERE id_usuario = $id_usuario");
$usuario = mysqli_fetch_assoc($query);

$id_usuario = $usuario['id_usuario'];
$nom_usuario = $usuario['nom_usuario'];
$email_usuario = $usuario['email_usuario'];
$celular_usuario = $usuario['celular_usuario'];
$estado_usuario = $usuario['sgl_estado'];
$cidade_usuario = $usuario['nom_cidade'];
?>

<!--START NOME-->
<div class="row g-3">
<input type="hidden" name="id" value="<?=$id_usuario?>" >
    <div class="col-md">
        <label class="form-label">Nome Completo</label>
        <input type="text" name="nome" id="nome" class="form-control" value="<?=$nom_usuario?>" disabled>
    </div>
  <!--END NOME-->
  <br>
  <!--START EMAIL-->
    <div class="col-md">
        <label class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?=$email_usuario?>" disabled>
        
    </div>
<!--END EMAIL-->
<br>
<!--START CELULAR-->
    <div class="col-md">
        <label class="form-label">Celular</label>
        <input type="celular" name="celular" id="celular" minlength="15" maxlength="15" class="form-control" value="<?=$celular_usuario?>" disabled>
    </div>
</div>

<!--END CELULAR-->
<br>
<!--START SELECT ESTADO-->
<div class="row g-2">
<div class="col-md">
        <label class="form-label">Estado</label>
        <input type="estado" name="estado" id="estado"  class="form-control" value="<?=$estado_usuario?>" disabled>
</div>
<!--END SELECT ESTADO-->
<br>
<!--START SELECT CIDADE-->
<div class="col-md">
        <label class="form-label">Cidade</label>
        <input type="cidade" name="cidade" id="cidade"  class="form-control" value="<?=utf8_encode($cidade_usuario)?>" disabled>
</div>
</div>
<br>
<!--END SELECT CIDADE-->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<a href="../index.php" class="btn btn-primary mb-3" >Cancelar</a>

<button type="submit" class="btn btn-outline-danger mb-3" >Confirmar Exclusão</button>
</div>
</form>

</div>
</div>




</div>

<!-- Optional JavaScript; choose one of the two! -->


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->


</body>
</html>


