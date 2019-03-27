<?php
    require('dao.php');

    $op = $_POST['op'];
    $busca = $_POST['busca'];

    $daoCarro = new daoCarro();
    if($op=="ano"){
        $feedback = $daoCarro->listarCarroAno($busca);
    }else if($op=="modelo"){
        $feedback = $daoCarro->listarCarroModelo($busca); 
    }else if($op=="marca"){
        $feedback = $daoCarro->listarCarroMarca($busca); 
    }else{
        $feedback = $daoCarro->listarCarro();
    }

    echo "<h3>Lista de carros</h3>";
    echo "<table border='1px'>";
    echo "<tr>";
    echo "<td>Issn</td> <td>Ano</td> <td>Modelo</td> <td>Marca</td> <td>Imagem</td>";
    echo "</tr>";
    while ($linha = mysqli_fetch_array($feedback)){
        echo "<tr>";
        $issn = $linha['issn'];
        $ano = $linha['ano'];
        $modelo = $linha['modelo'];
        $marca = $linha['marca'];
        $img = $linha['img'];
        echo "<td>$issn</td> <td>$ano</td> 
              <td>$modelo</td> <td>$marca</td>
              <td><img height='200'
              width='200' 
              src='data:image;base64,$img'></td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<a href='index.html'>Voltar</a>";