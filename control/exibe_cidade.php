<?php
include_once("../conn/conn.php");

$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * FROM cidade WHERE id_estado = '$id' ORDER BY nom_cidade");

while($row = mysqli_fetch_array($query)){
    $nome = $row['nom_cidade'];
    $id = $row['id_cidade'];

    echo "<option value=".$id." name='cidade' class='op_cidades'>".utf8_encode($nome)."</option>";
}


?>