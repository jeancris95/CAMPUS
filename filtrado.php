<?php
        function filtrado($texto){
            $texto=trim($texto);
            $texto=htmlspecialchars($texto);
            $texto=stripslashes($texto);
            return $texto;
        }
    ?>