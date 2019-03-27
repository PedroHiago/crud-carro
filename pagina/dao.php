<?php
    class daoCarro{    
        public $conexao = null;

        function cadastrarCarro($issn, $ano, $modelo, $marca, $img){
            $this->conectar();
            $consulta = "insert into carro(issn,ano,modelo,marca,img) values(".$issn.", '".$ano."', '".$modelo."', '".$marca."', '".$img."')";
            mysqli_query($this->conexao, $consulta);
            return true;
        }

        function listarCarro(){
            $this->conectar();
            $resultado =  mysqli_query($this->conexao, "select * from carro");
            return $resultado;
        }
//
        function listarCarroAno($ano){
            $this->conectar();
            $resultado =  mysqli_query($this->conexao, "select * from carro where ano =".$ano);
            return $resultado;
        }
        function listarCarroMarca($marca){
            $this->conectar();
            $resultado =  mysqli_query($this->conexao, "select * from carro where marca ='".$marca."'");
            return $resultado;
        }
        function listarCarroModelo($modelo){
            $this->conectar();
            $resultado =  mysqli_query($this->conexao, "select * from carro where modelo ='".$modelo."'");
            return $resultado;
        }
//
        function deletarCarro($issn){
            $this->conectar();
            $consulta = "delete from carro where issn = ".$issn;
            mysqli_query($this->conexao, $consulta);
            return true;
        }

        function atualizarCarro($issn, $ano, $modelo, $marca, $img){
            $this->conectar();
            $consulta = "update carro set ano ='".$ano."', modelo = '".$modelo."', 
                         marca = '".$marca."', img = '".$img."' where issn = ".$issn;
            mysqli_query($this->conexao, $consulta);
            return true;
        }

        function conectar(){
            $this->conexao = mysqli_connect("localhost", "root", "", "concessionaria");
        }

    }
        
        