<?php
/******************************************
* MORA MARCOS, JUAN JULIAN  FAI-3133 jjulian.mora@est.fi.uncoma.edu.ar 
* PERCEVAL, AUGUSTO FAI-3085 augusto.perceval@est.fi.uncoma.edu.ar
******************************************/

/**
* genera un arreglo de palabras para jugar
* @return array
*/
function cargarPalabras(){
  $coleccionPalabras = array();
  $coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>7);
  $coleccionPalabras[1]= array("palabra"=> "hepatitis" , "pista" => "enfermedad que inflama el higado", "puntosPalabra"=> 7);
  $coleccionPalabras[2]= array("palabra"=> "volkswagen" , "pista" => "marca de vehiculo", "puntosPalabra"=> 10);
  $coleccionPalabras[3]= array("palabra"=> "scout" , "pista" => "flor de lis", "puntosPalabra"=> 10);
  $coleccionPalabras[4]= array("palabra"=> "avion" , "pista" => "tiene alas", "puntosPalabra"=> 8);
  $coleccionPalabras[5]= array("palabra"=> "celular" , "pista" => "dispositivo de comunicacion", "puntosPalabra"=> 8);
  $coleccionPalabras[6]= array("palabra"=> "mate" , "pista" => "se comparte", "puntosPalabra"=> 7);
  
  return $coleccionPalabras;
}

/** Carga Coleccion de Juegos con sus puntajes y el indice que palabra se jugo
*@return array
*/

function cargarJuegos(){
	$coleccionJuegos = array();
	$coleccionJuegos[0] = array("puntos"=> 0, "indicePalabra" => 1);
	$coleccionJuegos[1] = array("puntos"=> 10,"indicePalabra" => 2);
    $coleccionJuegos[2] = array("puntos"=> 0, "indicePalabra" => 1);
    $coleccionJuegos[3] = array("puntos"=> 8, "indicePalabra" => 0);
    $coleccionJuegos[4] = array("puntos"=> 6, "indicePalabra" => 4);
    $coleccionJuegos[5] = array("puntos"=> 9, "indicePalabra" => 5);
    $coleccionJuegos[6] = array("puntos"=> 10, "indicePalabra" => 6);
    
    
    return $coleccionJuegos;
}

/**
* a partir de la palabra genera un arreglo para determinar si sus letras fueron o no descubiertas
* @param string $palabra
* @return array
*/
function dividirPalabraEnLetras($palabra){
    $coleccionLetras=[];
    for ($i=0; $i<strlen($palabra); $i++){
            $coleccionLetras[$i]["letra"]=$palabra[$i];
            $coleccionLetras[$i]["descubierta"] = false;  
             
    }
          
    return $coleccionLetras;
} 
    

/**
* muestra y obtiene una opcion de menú ***válida***
* @return int
*/
function seleccionarOpcion(){
    // @opcionValida Boolea - bandera
    // @opcion INT  - devuelve la opcion ingresada
        echo "--------------------------------------------------------------\n";
        echo "\n ( 1 ) Jugar con una palabra aleatoria"; 
        echo "\n ( 2 ) Jugar con una palabra elegida"; 
        echo "\n ( 3 ) Agregar una palabra al listado"; 
        echo "\n ( 4 ) Mostrar la informacion completa de un numero de juego"; 
        echo "\n ( 5 ) Mostrar la informacion completa del primer juego con mas puntaje"; 
        echo "\n ( 6 ) Mostrar la informacion completa del primer juego que supere un puntaje indicado por el usuario"; 
        echo "\n ( 7 ) Mostrar la lista de palabras ordenada por puntaje"; 
        echo "\n ( 8 ) Salir"; 
        echo "--------------------------------------------------------------\n";
        // Validamos la opcion ingresada sino solicitamos ingrese un opcion correcta
        do{
            echo "Indique una opcion valida :";
            $opcion = (trim(fgets(STDIN)));
            if($opcion < 1 && $opcion > 8){
                echo "Debe ingresar una opcion valida \n";
                $opcionValida = false;
            }else{
                $opcionValida = true;
            }
        }while(!$opcionValida);
        
        return $opcion;
}

/**
* Determina si una palabra existe en el arreglo de palabras
* @param array $coleccionPalabras
* @param string $palabra
* @return boolean
*/
function existePalabra($coleccionPalabras,$palabra){
    // $cantPal Int
    //$i INT
    //$existe Boolean
    $i=0;
    $cantPal = count($coleccionPalabras);
    $existe = false;
    while($i<$cantPal && !$existe){
        $existe = $coleccionPalabras[$i]["palabra"] == $palabra;
        $i++;
    }
    
    return $existe;
}


/**
* Determina si una letra existe en el arreglo de letras
* @param array $coleccionLetras
* @param string $letra
* @return boolean
*/
function existeLetra($coleccionLetras,$letra){
    //$cuentaLetras INT , $i INT 
    $descubierta = false;
    echo $letra." Verificando \n";
    for ($i = 0; $i < count($coleccionLetras); $i++) { 
          if (($coleccionLetras[$i]["letra"] == $letra)){
          $descubierta=true;
        }
         
    }
    return $descubierta;      
}

/**
* Solicita los datos correspondientes a un elemento de la coleccion de palabras: palabra, pista y puntaje. 
* Internamente la función también verifica que la palabra ingresada por el usuario no exista en la colección de palabras.
* @param array $coleccionPalabras
* @return array  colección de palabras modificada con la nueva palabra.
*/
function agregarPalabra($coleccionPalabras){

//$palabraNueva STRING
    do{
        echo "ingrese la palabra nueva";
        $palabraNueva=strtolower(fgets(STDIN));
        $existe=existePalabra($coleccionPalabras,$palabraNueva);//chequea que la palabra no este cargada
        $indicePalabra=count($coleccionPalabras);    
        
        if(!$existe){
            $coleccionPalabras[$indicePalabra]["palabra"]=$palabraNueva;
            echo "Ingrese pista ";
            $coleccionPalabras[$indicePalabra]["pista"]=strtolower(fgets(STDIN));
            echo "Ingrese puntaje: ";
            $coleccionPalabras[$indicePalabra]["puntosPalabra"]=strtolower(fgets(STDIN));
        }else{
            echo "La palabra ya existe en el listado: ";
        }
    }while($existe);
return $coleccionPalabras;
}
/**
* Obtener indice aleatorio entre 2 numeros $min y $max
*@param $min
*@param $max
*@return int $i
**/
function indiceAleatorioEntre($min,$max){
    $i = rand($min,$max); // /*>>> rand — Genera un número entero aleatorio entro los valores $min y $max <<<*/
    return $i;
}

/**
* solicitar un valor entre min y max
* @param int $min
* @param int $max
* @return int
*/
function solicitarIndiceEntre($min,$max){ 
    do{
        echo "Seleccione un valor entre $min y $max: ";
        $i = trim(fgets(STDIN));
    }while(!($i>=$min && $i<=$max));
    
    return $i;
}



/**
* Determinar si la palabra fue descubierta, es decir, todas las letras fueron descubiertas
* @param array $coleccionLetras
* @return boolean
*/
function palabraDescubierta($coleccionLetras){
    //$palabradescubierta BOOLEAN
    //$i INT , $fin INT
    $palabraDescubierta=true;
    for ($i = 0; $i < count($coleccionLetras); $i++) {
        if(!($coleccionLetras[$i]["descubierta"])){
            $palabraDescubierta=false;
        }
    }
return $palabraDescubierta;    
}

/** Solicita una letra y valida si es  una letra
* @ return string
*/
function solicitarLetra(){
    //$letraCorrecta BOOLEAN
    $letraCorrecta = false;
    do{
        echo "Ingrese una letra: ";
        $letra = strtolower(trim(fgets(STDIN)));
        if(strlen($letra)!=1){
            echo "Debe ingresar 1 letra!\n";
        }else{
            $letraCorrecta = true;
        }
        
    }while(!$letraCorrecta);
    
    return $letra;
}

/**
* Descubre todas las letras de la colección de letras iguales a la letra ingresada.
* Devuelve la coleccionLetras modificada, con las letras descubiertas
* @param array $coleccionLetras
* @param string $letra
* @return array colección de letras modificada.
*/
function destaparLetra($coleccionLetras, $letra){
   // $i INT, $fin INT

   for ($i = 0; $i < count($coleccionLetras); $i++) {
           if($coleccionLetras[$i]["letra"]==$letra){
            $coleccionLetras[$i]["descubierta"]=true;
        }
   }
   return $coleccionLetras; 
}

/**
* obtiene la palabra con las letras descubiertas y * (asterisco) en las letras no descubiertas. Ejemplo: he**t*t*s
* @param array $coleccionLetras
* @return string  Ejemplo: "he**t*t*s"
*/
function stringLetrasDescubiertas($coleccionLetras){
    //$pal STRING
    $pal = "";
    for ($i=0; $i< count($coleccionLetras); $i++){
        if ( $coleccionLetras[$i]["descubierta"]==1) {
            $pal = $pal. $coleccionLetras[$i]["letra"]; //Si la letra posee valor V en el array la grego
        }else{             //Si la letra posee valor F en el array agrego un *
            $pal= $pal."*";
        }
    } 
    return $pal;
}


/**
* Desarrolla el juego y retorna el puntaje obtenido
* Si descubre la palabra se suma el puntaje de la palabra más la cantidad de intentos que quedaron
* Si no descubre la palabra el puntaje es 0.
* @param array $coleccionPalabras
* @param int $indicePalabra
* @param int $cantIntentos
* @return int puntaje obtenido
*/
function jugar($coleccionPalabras, $indicePalabra, $cantIntentos){
    $pal = $coleccionPalabras[$indicePalabra]["palabra"];
    //echo $pal."\n";
    $coleccionLetras = dividirPalabraEnLetras($pal);//devuelve el arreglo coleccionLetras (letra y descubierta T o F)
    $puntaje = 0;
    $palabraFueDescubierta=false;//bandera
          
    //Mostrar pista:
    echo "Pista ".$coleccionPalabras[$indicePalabra]["pista"]."\n";
        echo "Palabra a descubir: ".stringLetrasDescubiertas($coleccionLetras)."\n";
    //solicitar letras mientras haya intentos y la palabra no haya sido descubierta:
        do{
        
        $pedirLetra=solicitarLetra();
        echo "Vamos a verificar si existe esa letra \n";
        $verificaLetra=existeLetra($coleccionLetras, $pedirLetra);//devuelve booleano V o F
        if($verificaLetra){
            echo "existe la letra \n";
            $coleccionLetrasmodificado = destaparLetra($coleccionLetras,$pedirLetra);
            $coleccionLetras = $coleccionLetrasmodificado;
            $palabraFueDescubierta=palabraDescubierta($coleccionLetras);
        }else{
            $cantIntentos=$cantIntentos-1;
            echo "La letra ". $pedirLetra." no pertenece a la palabra. Quedan ".$cantIntentos." intentos \n";
        }
        $cadenaLetra=stringLetrasDescubiertas($coleccionLetras);
        echo "Palabra a descubir: ".stringLetrasDescubiertas($coleccionLetras)."\n";
        
    }while(!$palabraFueDescubierta && $cantIntentos>0);
    
    If($palabraFueDescubierta){
        //obtener puntaje:
        $puntaje=$coleccionPalabras[$indicePalabra]["puntosPalabra"]+$cantIntentos;
        echo "\n¡¡¡¡¡¡GANASTE ".$puntaje." puntos!!!!!!\n";
    }else{
        echo "\n¡¡¡¡¡¡AHORCADO AHORCADO!!!!!!\n";
    }
    
    return $puntaje;
}

/**
* Agrega un nuevo juego al arreglo de juegos
* @param array $coleccionJuegos
* @param int $puntos
* @param int $indicePalabra
* @return array coleccion de juegos modificada
*/
function agregarJuego($coleccionJuegos,$puntos,$indicePalabra){
    
    $coleccionJuegos[] = array("puntos"=> $puntos, "indicePalabra" => $indicePalabra);    
    return $coleccionJuegos;
}

/**
* Muestra los datos completos de un registro en la colección de palabras
* @param array $coleccionPalabras
* @param int $indicePalabra
*/
function mostrarPalabra($coleccionPalabras,$indicePalabra){
    //$coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>7);
    echo "Su Palabra: " . $coleccionPalabras[$indicePalabra]["palabra"] . "\n";
    echo "La Pista de dicha palabra es: " . $coleccionPalabras[$indicePalabra]["pista"] . "\n";
    echo "Puntos de la palabra: " . $coleccionPalabras[$indicePalabra]["puntosPalabra"] . "\n";
      

}


/**
* Muestra los datos completos de un juego
* @param array $coleccionJuegos
* @param array $coleccionPalabras
* @param int $indiceJuego
*/
function mostrarJuego($coleccionJuegos,$coleccionPalabras,$indiceJuego){
    //array("puntos"=> 8, "indicePalabra" => 1)
    echo "\n\n";
    echo "<-<-< Juego ".$indiceJuego." >->->\n";
    echo "  Puntos ganados: ".$coleccionJuegos[$indiceJuego]["puntos"]."\n";
    echo "  Información de la palabra:\n";
    mostrarPalabra($coleccionPalabras,$coleccionJuegos[$indiceJuego]["indicePalabra"]);
    echo "\n";
}

/**
* Buscar juego con mas puntaje
* @param array $coleccionJuegos
* @return int
*/
function juegoConMasPuntaje ($coleccionJuegos,$maximoPuntaje){
    $indiceJuego = 0;
    $ptos = 0;
    // busco en todos los juegos el mayor puntaje 

    for ($i=0; $i< count($coleccionJuegos); $i++){
        $ptos = $coleccionJuegos[$i]["puntos"];
        if ($ptos > $maximoPuntaje) {
            $maximoPuntaje = $ptos;
            $indiceJuego = $i;
        }
    } 
    return $indiceJuego;    
}

/**
* ingresar y validar puntos
* @return int
*/
function ingresarPuntosUsuario (){
    do{
        echo "Indique los puntos que deben ser superado :";
        $puntosUsuario = (trim(fgets(STDIN)));
        if($puntosUsuario < 1 && $puntosUsuario > 99999){
            echo "Debe ingresar una opcion valida \n";
            $opcionValida = false;
        }else{
            $opcionValida = true;
        }
    }while(!$opcionValida);
    return $puntosUsuario;
}
/**
* Verifica y existe juego con puntos
* @return boolean
*/
function verificaJuegoConMasPuntaje ($coleccionJuegos,$puntosUsuario){
    $hayJuegoMayor = false;
    // busco en todos juegos el mayor puntaje si existe algu

    for ($i=0; $i< count($coleccionJuegos); $i++){
        $ptos = $coleccionJuegos[$i]["puntos"];
        if ($ptos > $puntosUsuario) {
            $hayJuegoMayor = true;
        }
    } 
    return $hayJuegoMayor;    
}

/*>>> Implementar las funciones necesarias para la opcion 6 del menú <<<*/

/*>>> Implementar las funciones necesarias para la opcion 7 del menú <<<*/




/******************************************/
/************** PROGRAMA PRINCIAL *********/
/******************************************/
define("CANT_INTENTOS", 6); //Constante en php para cantidad de intentos que tendrá el jugador para adivinar la palabra.
$coleccionPalabrasPrincipal=cargarPalabras();//almaceno el arreglo coleccionPalabras
$coleccionJuegosPrincipal=cargarJuegos();//almaceno el arreglo coleccionJuegos
do{
    $opcion = seleccionarOpcion();
    switch ($opcion) {
    case 1: //Jugar con una palabra aleatoria
            $cantIntentos=6;
            $min=0;
            $maximo=count($coleccionPalabrasPrincipal);
            $indiceAleatorioPrincipal=indiceAleatorioEntre($min,$maximo);
            $jugarPrincipal=jugar($coleccionPalabrasPrincipal, $indiceAleatorioPrincipal, $cantIntentos);
        break;
    case 2: //Jugar con una palabra elegida
            $cantIntentos=6;
            $min=0;
            $maximo=count($coleccionPalabrasPrincipal)-1;
            $indiceJuegoPrincipal = solicitarIndiceEntre($min, $maximo);
            $jugarPrincipal=jugar($coleccionPalabrasPrincipal, $indiceJuegoPrincipal, $cantIntentos);

        break;
    case 3: //Agregar una palabra al listado

        break;
    case 4: //Mostrar la información completa de un número de juego
            $min=0;
            $maximo=count($coleccionJuegosPrincipal)-1;
            echo "Mostrar informacion de Juego";
            $indiceJuegoPrincipal= solicitarIndiceEntre($min,$maximo);
            mostrarJuego($coleccionJuegosPrincipal,$coleccionPalabrasPrincipal,$indiceJuegoPrincipal);
        break;
    case 5: //Mostrar la información completa del primer juego con más puntaje
            echo "Primer Juego con mas Puntaje";
            $indiceJuegoPrincipal= juegoConMasPuntaje($coleccionJuegosPrincipal,0);
            mostrarJuego($coleccionJuegosPrincipal,$coleccionPalabrasPrincipal,$indiceJuegoPrincipal);
        break;
    case 6: //Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario
            $puntosUsuarioPrincipal = ingresarPuntosUsuario();
            if (verificaJuegoConMasPuntaje($coleccionJuegosPrincipal,$puntosUsuarioPrincipal)){
                echo "el Juego con mas Puntaje que: ".$puntosUsuarioPrincipal."\n";
                $indiceJuegoPrincipal= juegoConMasPuntaje($coleccionJuegosPrincipal,0);
                mostrarJuego($coleccionJuegosPrincipal,$coleccionPalabrasPrincipal,$indiceJuegoPrincipal);
            }else{
                echo "No existe un juego que tenga mas de".$puntosUsuarioPrincipal."\n";
            }

        break;
    case 7: //Mostrar la lista de palabras ordenada por orden alfabetico

        break;
    }
}while($opcion != 8);

