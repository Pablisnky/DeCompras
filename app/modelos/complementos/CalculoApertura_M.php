<?php
    class CalculoApertura_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
    
        // SELECT con los horarios de tiendas en formato 12 horas
        public function consultarHorario_LV($IDs_Tiendas){
            $stmt = $this->dbh->prepare(
                "SELECT *, DATE_FORMAT(inicio_m, '%h:%i %p') AS inicio_m, DATE_FORMAT(culmina_m, '%h:%i %p') AS culmina_m, DATE_FORMAT(inicia_t, '%h:%i %p') AS inicia_t, DATE_FORMAT(culmina_t, '%h:%i %p') AS culmina_t 
                FROM horarios 
                WHERE ID_Tienda IN ($IDs_Tiendas)"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        // SELECT con los horarios del sabado en formato 12 horas
        public function consultarHorario_Sab($IDs_Tiendas){
            $stmt = $this->dbh->prepare("SELECT *, DATE_FORMAT(inicia_m_Sab, '%h:%i %p') AS inicia_m_Sab, DATE_FORMAT(culmina_m_Sab, '%h:%i %p') AS culmina_m_Sab, DATE_FORMAT(inicia_t_Sab, '%h:%i %p') AS inicia_t_Sab, DATE_FORMAT(culmina_t_Sab, '%h:%i %p') AS culmina_t_Sab FROM horariosabado WHERE ID_Tienda IN ($IDs_Tiendas)");

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        // SELECT con los horarios del domingo en formato 12 horas
        public function consultarHorario_Dom($IDs_Tiendas){
            $stmt = $this->dbh->prepare("SELECT *, DATE_FORMAT(inicia_m_Dom, '%h:%i %p') AS  inicia_m_Dom, DATE_FORMAT(culmina_m_Dom, '%h:%i %p') AS culmina_m_Dom, DATE_FORMAT(inicia_t_Dom, '%h:%i %p') AS inicia_t_Dom, DATE_FORMAT(culmina_t_Dom, '%h:%i %p') AS culmina_t_Dom FROM horariodomingo WHERE ID_Tienda IN ($IDs_Tiendas)");

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        // SELECT con los horarios de algun día de exepción en formato 12 horas
        public function consultarHorario_Esp($IDs_Tiendas){
            $stmt = $this->dbh->prepare("SELECT *, DATE_FORMAT(inicia_m_Esp, '%h:%i %p') AS  inicia_m_Esp, DATE_FORMAT(culmina_m_Esp, '%h:%i %p') AS culmina_m_Esp, DATE_FORMAT(inicia_t_Esp, '%h:%i %p') AS inicia_t_Esp, DATE_FORMAT(culmina_t_Esp, '%h:%i %p') AS culmina_t_Esp FROM horarioespecial WHERE ID_Tienda IN ($IDs_Tiendas)");

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    }