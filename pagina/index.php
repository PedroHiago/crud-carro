<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8" />
        <style>
            div{
                text-align: center;
                background-color: gray;
            }
        </style>
    </head>
    <body>
        <div>
            <h3>Cadastrar Carro:</h3>
            <form method="POST" action="cadastra.php" enctype="multipart/form-data">
                <p> Issn: <input type="text" name="issn" /> </p>
                <p> Ano: <input type="text" name="ano" /> </p>
                <p> Modelo: <input type="text" name="modelo" /> </p>
                <p> Marca: <input type="text" name="marca" /> </p>

                <img src="" style="display:none" height="150"  id="image">
                <input id="cor" type="file" name="img" onchange="showImage.call(this)">
                <script>
                function showImage(){
                    if(this.files && this.files[0]){
                        var obj = new FileReader();
                        obj.onload = function(data){
                            var image =document.getElementById("image");
                            image.src = data.target.result;
                            image.style.display = "block"; 
                        }
                        obj.readAsDataURL(this.files[0]);
                    }
                }
                </script>
                <p> <input type="submit" name="sumit" value="Cadastrar"/> </p>
            </form>
        </div>
        
        <div>
            <form method="POST" action="lista.php">
                <!--<h3>Listar Carros:</h3>
                <a href="lista.php">Listar todos</a>-->
                <h3> Pesquisar por:</h3>
                <select id="l" name="op">
                    <option value="todos">todos</option>
                    <option value="ano">ano</option>
                    <option value="modelo">modelo</option>
                    <option value="marca">marca</option>
                </select>
                <input type="text" name="busca">
                <input type="submit" value="Enviar">
            </form>
        </div>

        <div>
            <h3>Deletar Carro</h3>
            <form method="POST" action="deleta.php">
                <p>Issn: <input type="text" name="issn"/></p>
                <p> <input type="submit" value="Deletar"/> </p>
            </form>
        </div>

        <div>
            <h3>Atualizar Carro</h3>
            <form method="POST" action="atualiza.php"  enctype="multipart/form-data">
                <p> Issn: <input type="text" name="issn" /> </p>
                <p> Ano (novo): <input type="text" name="ano" /> </p>
                <p> Modelo (novo): <input type="text" name="modelo" /> </p>
                <p> Marca (novo): <input type="text" name="marca" /> </p>
       
                <img src="" style="display:none" height="150"  id="image2">
                <input type="file" name="img" onchange="showImage.call(this)">
                <script>
                function showImage(){
                    if(this.files && this.files[0]){
                        var obj = new FileReader();
                        obj.onload = function(data){
                            var image =document.getElementById("image2");
                            image.src = data.target.result;
                            image.style.display = "block"; 
                        }
                        obj.readAsDataURL(this.files[0]);
                    }
                }
                </script>

                <p> <input type="submit" name="sumit" value="Atualizar"/> </p>
            </form>
        </div>

        <div>
            <h3>Gerar Relatório:</h3>
            <form method="POST" action="lista.php">
                <h3> Marca:</h3>
                <!--
                <select id="l" name="op">
                    /*<?php
                        require('dao.php');
                        $daoCarro = new daoCarro();
                        $i=0;
                        $feedback = $daoCarro->listarCarro();
                        while ($linha = mysqli_fetch_array($feedback)){?>
                            <option value="<?php echo $linha['marca'] ?>"><?php echo $linha['marca'] ?></option>
                        <?php } ?>*/
                </select>-->
                <input type="submit" value="Gerar">
                <br><br><br>
            </form>
        </div>
    </body>
</html>