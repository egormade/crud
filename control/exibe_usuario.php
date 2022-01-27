<html>
<head></head>
<body>
    

<?php

$query = mysqli_query($conn,"SELECT * FROM usuario 
INNER JOIN estado ON usuario.id_estado = estado.id_estado 
INNER JOIN cidade ON usuario.id_cidade = cidade.id_cidade ORDER BY data_cadastro DESC");

if (mysqli_num_rows($query) == 0){
    //there are results
    echo '<tr>
    <td class="align-middle">Não há usuários cadastrados</td></tr>';
}

else{
while ($usuario = mysqli_fetch_assoc($query)){
    $id_usuario = $usuario['id_usuario'];
    $nom_usuario = $usuario['nom_usuario'];
    $email_usuario = $usuario['email_usuario'];
    $celular_usuario = $usuario['celular_usuario'];
    $cidade_usuario = $usuario['nom_cidade'];
    $estado_usuario = $usuario['sgl_estado'];
    $data_cadastro = $usuario['data_cadastro'];
    ?>

    <tr>
        <td class="align-middle"><?= $nom_usuario ?></td>
        <td class="align-middle"><?= $email_usuario ?></td>
        <td class="align-middle"><?= $celular_usuario ?></td>
        <td class="align-middle"><?= utf8_encode($cidade_usuario) ?> \ <?= $estado_usuario ?></td>
        <td class="align-middle"><?= $data_cadastro ?></td>
        <td class="align-middle"><a href="control/confirma_update.php?id=<?= $id_usuario ?>" class='btn btn-outline-primary'>Alterar</button>
        <td class="align-middle"><a href="control/confirma_delete.php?id=<?= $id_usuario ?>" class='btn btn-outline-danger'>Delete</button>
        </td>
    </tr>


  
<?php    
}}
?>




</body>
</html>