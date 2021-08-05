<?php
session_start();
require_once("collectItens.php");
$products = collectItens();
$date = date('Y/m/d');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="functions.js"></script>
    
    <title>Principal Page</title>
</head>

<body onload="test()">
    <div class="container">
        <div class="register">

            <section id="form-register">
                <h1>Cadastro de Itens</h1>

                <form action="itensRegister.php" method="GET">

                    <div>
                        <label for="name"><br>Nome do produto:</label><br>
                        <input type="text" id="name"  name="name" maxlength="70" minlength="2" required><br>
                    </div>

                    <div>
                        <label for="product-id">ID do produto:</label><br>
                        <input type="text" id="product-id" name ="product-id" maxlength="20" minlength="2" required>
                    </div>
                    <p id="repeat-id">
                            
                         <?php

                            if (isset($_SESSION['repeatId'])) {

                                echo $_SESSION['repeatId'];
                                unset($_SESSION['repeatId']);
                            
                            }
                        ?>
                            
                        
                    </p>

                    <div>
                        <label for="price">Preço do produto:</label><br>
                        <input type="number" step=".01" id="price" name="price" required onKeyDown="if(this.value.length==14 && event.keyCode!=8 || event.keyCode == 69 || event.keyCode == 107 || event.keyCode == 189 || event.keyCode == 109) return false;">
                        <span>R$</span><br>
                    </div>

                    <div>
                        <span>Data de cadastro:</span><br>

                        <div id="data-cadastro">
                            <input type="radio" id="today" name="dateCreation" value="<?=$date;?>" onclick="test()" required checked>
                            <label for="today">Hoje</label>
                            <input type="radio" id="personalized" name="dateCreation" onclick="test()">
                            <label for="personalized"><input type="date" name="dateCreation"  id="date" required></label>
                        </div>
                        
                    </div>

                    <div id="description-components">
                        <label for="description">Descrição do produto:</label><br>
                        <textarea name="description" id="description" name="description" wrap="soft" onkeyup="wordCount()" value="" maxlength="200"></textarea><br>
                        <p id="quantidade">Palavras Restantes: <span id="result">200</span></p><br>
                    </div>
                    

                    <div>
                        <button type="submit" id="button">Cadastrar item</button>
                    </div>

                    <div id="problems">
                        <p>Está com problemas?</p>
                        <p>Entre em contato conoscoco clicando <a href="mailto:ruanbenfica@hotmail.com">aqui</a></p>
                    </div>


                </form>

            </section>

        </div>
        
        <div id="table">

            <section id="table-content">
                <table>
                    <thead>
                        <tr>
                            <th class="column 1">ID</th>
                            <th class="column 2">Nome do Produto</th>
                            <th class="column 3">Preço do Produto</th>
                            <th class="column 4">Data de cadastro</th>
                            <th class="column 5">Descrição do produto</th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($products as $itens) {

                            $newDate = date('d/m/Y', strtotime($itens['dateCreation']));

                            echo "<tr>";
                            echo "<td>" . $itens['productId'] . "</td>";
                            echo "<td>" . $itens['productName'] . "</td>";
                            echo "<td><span> R$ </span>" . $itens['productPrice'] . "</td>";
                            echo "<td>" .$newDate . "</td>";
                            echo "<td>" . $itens['productDescription'] . "</td>";
                }
                    ?>
                </table>

            </section>
        <div>
    </div>

</body>

</html>