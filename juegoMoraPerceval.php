<?php
/******************************************
*Completar:
* Augusto y Jota
******************************************/
//prueba commit222



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

/**
* /*>>> completar comentario <<<*/

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
            $coleccionLetras[$i]["descubierta"]=false;  
            print_r($coleccionLetras);
            
    }
          
    return $coleccionLetras;
} 
    


<?php
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
        
        do{
            echo "Indique una opcion valida";
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
    $contPalabras = count($coleccionLetras);
    for($i=0; $i<$contPalabras; $i++){
            
              if (($coleccionLetras[$i]["letra"]==$letra)){
                //$coleccionLetras[$i]["descubierta"]=true;
                $descubierta=true;
              }else{
                $descubierta=false;
                //$coleccionLetras[$i]["descubierta"]=false;
    
    return $descubierta;  
    
}

/**
* Solicita los datos correspondientes a un elemento de la coleccion de palabras: palabra, pista y puntaje. 
* Internamente la función también verifica que la palabra ingresada por el usuario no exista en la colección de palabras.
* @param array $coleccionPalabras
* @return array  colección de palabras modificada con la nueva palabra.
*/
/*>>> Completar la interfaz y cuerpo de la función. Debe respetar la documentación <<<*/


/**
* Obtener indice aleatorio
*@param $min
*@param $max
*@return INT $i
 *>>> Completar documentacion <<<
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
    
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
}

/**
* /*>>> Completar documentacion <<<*/
*/
function solicitarLetra(){
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
    
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
}

/**
* obtiene la palabra con las letras descubiertas y * (asterisco) en las letras no descubiertas. Ejemplo: he**t*t*s
* @param array $coleccionLetras
* @return string  Ejemplo: "he**t*t*s"
*/
function stringLetrasDescubiertas($coleccionLetras){
    $pal = "";
    
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
    
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
    $coleccionLetras = dividirPalabraEnLetras($pal);
    //print_r($coleccionLetras);
    $puntaje = 0;
    
    
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
    
    //Mostrar pista:
    
    //solicitar letras mientras haya intentos y la palabra no haya sido descubierta:
    
    If($palabraFueDescubierta){
        //obtener puntaje:
        
        echo "\n¡¡¡¡¡¡GANASTE ".$puntaje." puntos!!!!!!\n";
    }else{
        echo "\n¡¡¡¡¡¡AHORCADO AHORCADO!!!!!!\n";
    }
    
    return $puntaje;
}

/**
* Agrega un nuevo juego al arreglo de juegos
* @param array $coleccionJuegos
* @param int $ptos
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
    
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
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


/*>>> Implementar las funciones necesarias para la opcion 5 del menú <<<*/

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

        break;
    case 2: //Jugar con una palabra elegida

        break;
    case 3: //Agregar una palabra al listado

        break;
    case 4: //Mostrar la información completa de un número de juego

        break;
    case 5: //Mostrar la información completa del primer juego con más puntaje

        break;
    case 6: //Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario

        break;
    case 7: //Mostrar la lista de palabras ordenada por orden alfabetico

        break;
    }
}while($opcion != 8);

