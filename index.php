<?php
session_start();
include_once('conn/conn.php');
?>

<!doctype html>
<html>
<head>
<!-- Required meta tags -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8_general_ci">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Personal CSS -->
<link rel="stylesheet"  href="css/style.css" >
    

<!-- Bootstrap CSS -->
<link rel="stylesheet"  href="css/bootstrap.min.css" >

<!-- JavaScript -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/funcoes.js"></script>


<title>Cadastro de Pessoas</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-12">

<h2><strong>Cadastro de Pessoas</strong></h2>
<p><em>Confirme as informações</em> de cadastro antes de cadastrar.</p>
<br>

<?php
if(!empty($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}

?>


<form action="control/insert_cadastro.php" method="POST">

<!--START NOME-->
<div class="row g-3">
<div class="col-md">
  <div class="form-floating">
  <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome completo" required>
  <label for="floatingInputInvalid">Nome Completo</label>
  </div>
</div>
  <!--END NOME-->
  <br>
  <!--START EMAIL-->
  <div class="col-md">
  <div class="form-floating">
  <input type="email" name="email" id="email" class="form-control"  placeholder="egor@email.com" required>
  <label for="floatingInputInvalid">Email</label>
  <div id="emailHelp" class="form-text">Nós nunca compartilharemos seu email.</div>
  </div>
  </div>

<!--END EMAIL-->
<br>
<!--START CELULAR-->
<div class="col-md">
<div class="form-floating">
<input type="celular" name="celular" id="celular" minlength="15" maxlength="15" class="form-control" placeholder="(DD) 00000-0000" required>
<label for="floatingInputInvalid">Celular</label>
</div>
</div>
</div>
<!--END CELULAR-->
<br>
<!--START SELECT ESTADO-->
<div class="row g-2">
<div class="col-md">
<div class="form-floating">

<select id="estados" class="form-select" name="estado" aria-label="Floating label select example" required>

<option selected>Selecione seu estado</option>
<?php
$op_estado = mysqli_query($conn,"SELECT * FROM estado");
while($array_estado = mysqli_fetch_assoc($op_estado)){
echo "<option value=".$array_estado['id_estado'].">".utf8_encode($array_estado['nom_estado'])."</option>";
}
?>
</select>
<label for="floatingInputInvalid">Estado</label>
</div>
</div>
<!--END SELECT ESTADO-->
<br>
<!--START SELECT CIDADE-->
<div class="col-md">
<div class="form-floating">

<select id="cidades" class="form-select"  name="cidade" aria-label="Default select example" required>
<option>Selecione sua cidade</option>

</select>
<label for="floatingInputInvalid">Cidade</label>

</div>
</div>
</div>
<br>
<!--END SELECT CIDADE-->

<button type="submit" class="btn btn-outline-primary mb-3" >Cadastrar</button>

</form>

</div>
</div>




<table class="table table-sm ">
<thead>
<tr>
<th scope="col">Nome Completo</th>
<th scope="col">E-mail</th>
<th scope="col">Celular</th>
<th scope="col">Cidade/UF</th>
<th scope="col">Cadastrado em</th>
<th scope="col">Alterar</th>
<th scope="col">Deletar</th>

</tr>
</thead>
<tbody>
<!--Inclusão de listagem de usuário-->    
<?php     
include('control/exibe_usuario.php');
?>
</tbody>
</table>

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


