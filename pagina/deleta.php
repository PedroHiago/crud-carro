<?php
    include 'dao.php';

    $issn = $_POST['issn'];

    $daoCarro = new daoCarro();
    $feedback = $daoCarro->deletarCarro($issn);

    if ($feedback == true){
        echo "<h3>Carro excluido com sucesso!</h3>";
        echo "<a href='index.html'>Voltar</a>";
    } else{
        echo "<h3>Falha durante a exclusao!</h3>";
        echo "<a href='index.html'>Voltar</a>";
    }