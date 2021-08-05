<?php

function collectItens (){

require_once("connection.php");

$selectItens = "SELECT * FROM itens order by dateCreation DESC";
$result = mysqli_query($conn, $selectItens);

$itens = array();
    $contagem = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $itens[$contagem] = $row;
            $contagem++;
        }
    }

    return $itens;

}