<?php 

function obtenerVotos($Pos, $Neg) {
    $PosMasNeg = $Pos + $Neg;
    $Porcen=$Pos*100;
    $Porcentaje=round($Porcen/$PosMasNeg,2); 
    
    return $Porcentaje;


}

function cambiarColorBarra($suma){
    $color='';
    if($suma<20){
        $color='#A21010 ';
    }
    if($suma>=20 && $suma <50){
        $color='#FFD700';
    }
    if( $suma >=50){
        $color='#117A65 ';
    }
     return $color;   
}

function sumaVotos($Pos, $Neg){
    return $Pos+$Neg;  
}

function colorCuotas($var){
    $color='';
    if($var<25){
        $color='#ff0000';
    }
    if($var>=25 && $var <50){
        $color='#FFD700';
    }
    if( $var >=50 && $var <80){
        $color='#00FFEE';
    }
    if($var<=80){
        $color='#4BD219';
    }
     return $color;   
}


function mensajeCuotas($var){
    $mensaje='';
    if($var<35){

        $mensaje='sin cuotas';
    }
    if($var>=35 && $var <65){
        $mensaje='3 cuotas';
    }
    if( $var >=65 && $var <80){
        $mensaje='6 cuotas';
    }
    if($var>=80){
        $mensaje='12 cuotas';
    }
     return $mensaje;   
}

function cambiarColorValoracion($suma){
    $color='';
    if($suma<25){
        $color='#ff0000';
    }
    if($suma>=25 && $suma <50){
        $color='#FFD700';
    }
    if( $suma >=50 && $suma <80){
        $color='#00FF00';
    }
    if($suma>=80){
        $color='#00ffff';
    }
     return $color;   
}

function cambiarColorFinanciacion($suma){
    $color='';
    if($suma<35){
        $color='#ff0000';
    }
    if($suma>=35 && $suma <65){
        $color='#FFFF00';
    }
    if( $suma >=65 && $suma <80){
        $color='#40CFFF';
    }
    if($suma>=80){
        $color='#00ff00';
    }
     return $color;   
}

 

?>