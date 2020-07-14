<?php
    // Para redireccionar pagina
    function redireccionar($Pagina){
        header('location: ' . RUTA_URL . $Pagina);
    }