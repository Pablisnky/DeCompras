<?php
//Se mapea la url
//Mientras no se cargue ninguna direción en el url cargara el controlador por defecto

class Core{
    // En la url el controlador es el index 0, el metodo el index 1, el parametro el index 2
    protected $controladorActual = 'Inicio_C';
    protected $metodoActual = 'index';
    protected $parametros = [];

    public function __construct(){
        // print_r($this->geturl());
        // echo '<br>';
        $url = $this->geturl();
        
        // echo "************************************************************************"  . "<br>";
        //CARGA CONTROLADOR
        //Busca en la carpeta controladores si el controlador que hay en la url existe
        //Si existe se setea como controlador; sino, por defecto el controlador es "inicio_C"
        if(file_exists("../app/controladores/" . ucwords($url[0]) . ".php")){
            $this->controladorActual = ucwords($url[0]);
            // echo "Nombre del controlador cargado: " . $this->controladorActual .  "<br>";
            unset($url[0]);
        }
        else{
            // echo "El controlador no se ha especificado" . "<br>";
            // echo "Por defecto se ha cargado el controlador= " . $this->controladorActual . "<br>";
        }

        //se solicita el controlador recibido y se instancia
        require_once("../app/controladores/" . $this->controladorActual . ".php");
        $this->controladorActual = new $this->controladorActual;

        // echo "************************************************************************"  . "<br>";

        //Busca en el controlador hayado, si el metodo que hay en la url existe
        //Sino existe se setea como por defecto "index"
        if(isset($url[1])){
            if(method_exists($this->controladorActual, $url[1])){
                //Se chequea el metodo
                $this->metodoActual = $url[1];
                // echo "El metodo \"" . $url[1] . "\" se ha cargado" . "<br>";
            }
            else{
                // echo "El metodo  \"" . $url[1] . "\" no existe" . "<br>";
            }
        }
        else{
            // echo "No hay metodo declarado, se carga el metodo por defecto: " . $this->metodoActual . "<br>";
        }
        unset($url[1]);

        // echo "************************************************************************"  . "<br>";
        //Se obtienen los parametros enviados por la url
        $this->parametros = $url ? array_values($url) : [1];
        // base64_encode($this->parametros);
        // echo "<br><br><br><br><br><br><br><br>";
        // //Se cifran los parametros enviados por url
        // $Parametros = base64_encode($this->parametros[0]);
        // echo "Los parametros enviados son: ";
        // echo $Parametros;
        // echo '<pre>';
        // print_r($this->parametros);
        // echo '</pre>';
        // echo "************************************************************************"  . "<br>";
        // exit;
        //llamar callback con parametros array
        call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
    }

    public function geturl(){
        //La url se obtiene via get[] desde htaccess que esta en la carpeta public, que mapea todo lo que se hace
        // echo " 1.- Se obtiene el controlador[0], metodo[1] y parametro[2] de la url: " . $_GET['url'] . "<br>";
        //Se verifica que la url este seteada
        if(isset($_GET['url'])){
            // echo '$_GET["url"] esta declarada y vale:' . '<br>';
            // echo $_GET['url'] . '<br>';
            
            // echo "************************************************************************"  . "<br>";
            $url= rtrim($_GET['url'],'/');
            // $url= filter_var($url, FILTER_SANITIZE_URL); esta linea es importante pero no deja que la letra ñ y letras con acentos aparezcan en la url
            //Al usar FILTER_SANITIZE_URL entre otras cosas se eliminan los espacios en blanco de los parametros enviados.
            // $url= filter_var($url, FILTER_SANITIZE_URL);
            //La cadena se convierte en un array para obtener en cada indice el controlador, el metodo y los parametros
            $url= explode('/', $url);
            return $url;
        }
        else{
            // echo '$_GET["url"] no esta declarada';
            $url = array('Inicio_C');            
            return $url;
        }
    }
}