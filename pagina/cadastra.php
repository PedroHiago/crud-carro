<?php
    include 'dao.php';
    //data access object

    $issn = $_POST['issn'];
    $ano = $_POST['ano'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];

    if(isset($_POST['sumit'])){
        if(getimagesize($_FILES['img']['tmp_name'])==false){
            echo "Por favor, escolha uma imagem";
        }else{
            $img=addslashes($_FILES['img']['tmp_name']);
            $name=addslashes($_FILES['img']['name']);
            $img=file_get_contents($img);
            $img=base64_encode($img);
        }
    }
    $daoCarro = new daoCarro();
    $feedback = $daoCarro->cadastrarCarro($issn, $ano, $modelo, $marca, $img);

    if ($feedback == true){
        echo "<h3>Carro cadastrado com sucesso!</h3>";
        echo "<a href='index.html'>Voltar</a>";
    } else{
        echo "<h3>Falha durante o cadastro!</h3>";
        echo "<a href='index.html'>Voltar</a>";
    }
    
    