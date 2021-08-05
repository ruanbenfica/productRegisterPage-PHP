<?php
require_once('connection.php');
session_start();

$productName = $_GET['name'];
$productId = $_GET['product-id'];
$productPrice = $_GET['price'];
$productDescription = $_GET['description'];
$dateCreation = $_GET['dateCreation'];


$formatPrice = str_replace(',', '.', $productPrice);


    $verificar = "SELECT * FROM itens WHERE productId='$productId' LIMIT 1";
    $result = mysqli_query($conn, $verificar);
    $resultado = mysqli_fetch_assoc($result);

    if (isset($resultado)) {

        $_SESSION['repeatId'] = "• ID já cadastrado";
        header("Location:principalPage.php");

    } else {

    $cadastrar = "INSERT INTO itens (productId , productName, productPrice, dateCreation, productDescription) VALUES
    ('$productId','$productName', '$formatPrice', '$dateCreation','$productDescription')";

    $result1 = mysqli_query($conn, $cadastrar);
    header("Location:principalPage.php");

    
    }