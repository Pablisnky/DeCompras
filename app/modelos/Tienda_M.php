<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Tienda_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        public function consultarTiendas($Categoria){
            //Se CONSULTAN las tiendas afiliadas por categoria
            $stmt = $this->dbh->prepare("SELECT * FROM tiendas INNER JOIN tiendas_categorias ON tiendas.ID_Tienda=tiendas_categorias.ID_Tienda INNER JOIN categorias ON categorias.ID_Categoria=tiendas_categorias.ID_Categoria WHERE categorias.categoria = :Categoria");      
            $stmt->bindParam(':Categoria', $Categoria, PDO::PARAM_STR);
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }
    }