<?php
/******************************************
* MORA MARCOS, JUAN JULIAN  FAI-3133 jjulian.mora@est.fi.uncoma.edu.ar 
* PERCEVAL, AUGUSTO FAI-3085 augusto.perceval@est.fi.uncoma.edu.ar
******************************************/

/**
* genera un arreglo de palabras para jugar
*El arreglo que retorna es bidimencional
* @return array
*/
function cargarPalabras(){
  $coleccionPalabras = array(); //Declaracion del arreglo
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
*El arreglo que retorna es bidimencional
*@return array
*/

function cargarJuegos(){
	$coleccionJuegos = array();//Declaracion del arreglo
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
* A partir de la palabra genera un arreglo donde cada posicion del arreglo contiene las letras
* para determinar fueron o no descubiertas
* @param string $palabra
*El arreglo que retorna es bidimencional
* @return array
*/
function dividirPalabraEnLetras($palabra){
    $coleccionLetras=[];
    for ($i=0; $i<strlen($palabra); $i++){//recorrido exhaustivo, con funcion strlen(divide un string en caracteres)
            $coleccionLetras[$i]["letra"]=$palabra[$i];
            $coleccionLetras[$i]["descubierta"] = false;  
             
    }
          
    return $coleccionLetras;
} 
    

/**
* muestra y obtiene una opcion de menú ***válida***
*Retorna la opcion que selecciona el usuario, para despues desarrolar el juego 
*@return int
*/
function seleccionarOpcion(){
    // @opcionValida Booleana - bandera
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
        echo "\n --------------------------------------------------------------\n";
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
    //$i , $n INT
    //$existe Boolean
    $existe = false;
    $i=0;
    $n=count($coleccionPalabras);
    while (($i < $n && !$existe)){//Recorrido parcial, apenas encuentra una palabra igual corta el recorrido
        if ($coleccionPalabras[$i]["palabra"] == $palabra){/**condicion que valida si la palabra ingresada 
                                                                  es igual a la del arreglo*/
                $existe= true;
            }
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
    //$cuentaLetras, $i INT 
    //$descubierta BOOLEAN
    $cuentaLetra = count($coleccionLetras);
    $i =0;
    $descubierta = false;
    echo $letra." Verificando \n";
    while($i < $cuentaLetra && !$descubierta){//Recorrido Parcial
        if (($coleccionLetras[$i]["letra"] == $letra)){//Condicion que valida si la letra coincide con una del arreglo
            $descubierta=true;
        }
    $i++;
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
//$indicePalabra INT
//$existe BOOLEAN
    do{
        echo "\n Ingrese una palabra nueva: ";
        $palabraNueva= strtolower(trim(fgets(STDIN))); //strtolower convierte la palabra ingresada en minisculas
        $existe=existePalabra($coleccionPalabras,$palabraNueva);//llamado a funcion que verifica que la palabra no este cargada
        $indicePalabra=count($coleccionPalabras);    
        if($existe){
            echo "La palabra ya existe en el listado";
            
        }else{
            echo "No existe la palabra, necesitamos agregar la pista y el puntaje \n";
            $coleccionPalabras[$indicePalabra]["palabra"]=$palabraNueva;
            echo "Ingrese pista ";
            $coleccionPalabras[$indicePalabra]["pista"]=strtolower(fgets(STDIN));
            $puntajeIngresado = ingresarPuntosUsuario();//llamada a funcion que verifica que el puntaje ingresado sea numeros
            $coleccionPalabras[$indicePalabra]["puntosPalabra"]=$puntajeIngresado;
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
    //$i INT 
    $palabraDescubierta=true;
    for ($i = 0; $i < count($coleccionLetras); $i++) {//Recorrido exhaustivo
        if(!($coleccionLetras[$i]["descubierta"])){//La key "descubierta" almacena un valor booleano
            $palabraDescubierta=false;
        }
    }
    return $palabraDescubierta;    
}

/** Solicita una letra y valida si es  una letra
* @return string
*/
function solicitarLetra(){
    //$letraCorrecta BOOLEAN
    //$letra STRING
    $letraCorrecta = false;
    do{
        echo "Ingrese una letra: ";
        $letra = strtolower(trim(fgets(STDIN)));//convierte la letra en minusculas
        if(strlen($letra)!=1){//verifica que sea una letra y no un N°
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
   // $i INT

   for ($i = 0; $i < count($coleccionLetras); $i++){//Recorrido exhaustivo para verificar cada letra del arreglo
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
    //$i INT
    $pal = "";
    for ($i=0; $i< count($coleccionLetras); $i++){//Recorrido exhaustivo para ir construyendo la palabra
        if ( $coleccionLetras[$i]["descubierta"]) {//Condicion que valida si la key "descubierta" tiene valor TRUE
            $pal = $pal. $coleccionLetras[$i]["letra"]; 
        }else{             //Si la letra posee valor F en el array agrego un * en el string
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
    //$pal ARRAY
    //$puntaje INT 
    //$palabraFueDescubierta BOOLEAN
    $pal = $coleccionPalabras[$indicePalabra]["palabra"];
    $coleccionLetras = dividirPalabraEnLetras($pal);//llamada a la funcion, retorna el arreglo coleccionLetras (keys "letra" y "descubierta(T o F)")
    $puntaje = 0;
    $palabraFueDescubierta=false;//bandera
          
    //Mostrar pista:
    echo "Pista ".$coleccionPalabras[$indicePalabra]["pista"]."\n";
        echo "Palabra a descubir: ".stringLetrasDescubiertas($coleccionLetras)."\n";
    //solicitar letras mientras haya intentos y la palabra no haya sido descubierta:
        do{
            $pedirLetra=solicitarLetra();
            $verificaLetra=existeLetra($coleccionLetras, $pedirLetra);//devuelve booleano V o F
            if($verificaLetra){
                echo "existe la letra \n";
                $coleccionLetrasmodificado = destaparLetra($coleccionLetras,$pedirLetra);
                $coleccionLetras = $coleccionLetrasmodificado;
                $palabraFueDescubierta=palabraDescubierta($coleccionLetras);
        }else{
            $cantIntentos=$cantIntentos-1;
            echo "La letra ". $pedirLetra." no pertenece a la palabra. Quedan ".$cantIntentos." intentos \n";
            munieco($cantIntentos);
        }
        
        echo "Palabra a descubir: ".stringLetrasDescubiertas($coleccionLetras)."\n";
        
    }while(!$palabraFueDescubierta && $cantIntentos>0);//Estructura que se ejecuta mientras que la palabra no sea descubierta y la cantidad de intentos sea mayor a 0
    
    If($palabraFueDescubierta){
        $puntaje=$coleccionPalabras[$indicePalabra]["puntosPalabra"]+$cantIntentos;
        echo "\n¡¡¡¡¡¡GANASTE ".$puntaje." puntos!!!!!!\n";
    }else{
        echo "\n¡¡¡¡¡¡AHORCADO AHORCADO!!!!!!\n";
        echo " ┌─────┐ \n";
        echo " │     O \n";
        echo " │    ┌┼┘ \n";
        echo " │    ┌┴┐ \n";
        echo " │    │ │ \n";
        echo " │ \n";
        echo " └───────── \n";
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
function mostrarPalabra($coleccionPalabras,$indicePalabra){//funcion que se utiliza en funcion mostrarJuegos
   
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
    mostrarPalabra($coleccionPalabras,$coleccionJuegos[$indiceJuego]["indicePalabra"]);//lamado a la funcion mostras palabra
    echo "\n";
}

/**
* Buscar juego con mas puntaje para opcion 5
* @param array $coleccionJuegos
* @return int
*/
function juegoConMasPuntaje ($coleccionJuegos){
    //$n ,$j $ptos , $indiceJuego INT
    //$puntosArreglo ARRAY
    $n = count($coleccionJuegos);
    $ptos = 0;
    $indiceJuego = 0;
    for($j=0; $j<$n; $j++){//Recorrido exhaustivo para encontrar el puntaje mas alto dentro del arreglo
        $puntosArreglo= $coleccionJuegos[$j]["puntos"];
        echo $puntosArreglo."\n";
        if ( $ptos < $puntosArreglo){
            $ptos=$coleccionJuegos[$j]["puntos"];
            echo $ptos."\n";
            $indiceJuego = $j;
        }
    }
    return $indiceJuego;
}

/**
* Buscar juego con mas puntaje que el que me el usuario para opcion 6
* @param array $coleccionJuegos
* @return int
*/
function primerJuegoConMasPuntaje ($coleccionJuegos,$maximoPuntaje){   
    //$indiceJuego, $i, $n INT
    //$maximo BOOLEAN

    $indiceJuego=-1;
    $maximo = false;
    $i=0;
    $n=count($coleccionJuegos);
    while ($i< $n && !$maximo ){//Recorrido parcial para encontrar el primer juego con mas puntaje
        $ptos = $coleccionJuegos[$i]["puntos"];
        if ($ptos > $maximoPuntaje) {
            $maximoPuntaje = $ptos;
            $maximo = true;
            $indiceJuego = $i;
        }
    $i++;
    } 
    return $indiceJuego;    
}

/**
* ingresar y validar puntos
* @return int
*/
function ingresarPuntosUsuario (){
    //$puntosUsuario INT
    //$opcionValida BOOLEAN
    do{
        echo "Indique el Puntaje :";
        $puntosUsuario = (trim(fgets(STDIN)));
        if(is_numeric($puntosUsuario)&& $puntosUsuario>0){//Verificamos que ingrese numeros y que sean mayor a 0
            $opcionValida = true;
        }else{
            echo "Debe ingresar una opcion valida \n";
            $opcionValida = false;
        }
    }while(!$opcionValida);
    return $puntosUsuario;
}

/**
* Muestra el arreglo $coleccionPalabras ordenado
* @param $coleccionPalabras array
*/
function mostrarPalabrasOrdenadas ($coleccionPalabras){
    //$i INT
    //$palabrasOrdenadas ARRAY
    $palabrasOrdenadas = $coleccionPalabras;//realizamos copia del arreglo para no modificar los indices
    sort($palabrasOrdenadas);// sort Esta función ordena un array. Los elementos estarán ordenados de menor a mayor cuando la función haya terminado.
    echo "\n Palabras Ordenadas por Orden Alfabetico muestra con print_r segun enunciado\n";
    print_r($palabrasOrdenadas);
    echo "\n Palabras Ordenadas por Orden Alfabetico como nos gusta a nosotros\n";
    for($i=0; $i< count($palabrasOrdenadas);$i++){
        echo $palabrasOrdenadas[$i]["palabra"]."\n";
    }
    
}

/**
* Muestra el dibujo del ahorcado segun la cantidad de intentos
* @param $cantIntentos
*/
function munieco ($cantIntentos){
    switch ($cantIntentos) {
        case 5:     
            echo " ┌─────┐ \n";
            echo " │     O \n";
            echo " │      \n";
            echo " │      \n";
            echo " │        \n";
            echo " │ \n";
            echo " └───────── \n";
        break;
        case 4:     
            echo " ┌─────┐ \n";
            echo " │     O \n";
            echo " │     ┼ \n";
            echo " │      \n";
            echo " │       \n";
            echo " │ \n";
            echo " └───────── \n";
        break;
        case 3:     
            echo " ┌─────┐ \n";
            echo " │     O \n";
            echo " │    ┌┼ \n";
            echo " │     ┴  \n";
            echo " │        \n";
            echo " │ \n";
            echo " └───────── \n";
        break;
        case 2:     
            echo " ┌─────┐ \n";
            echo " │     O \n";
            echo " │    ┌┼┘ \n";
            echo " │    ┌┴  \n";
            echo " │        \n";
            echo " │ \n";
            echo " └───────── \n";
        break;
        case 1:     
            echo " ┌─────┐ \n";
            echo " │     O \n";
            echo " │    ┌┼┘ \n";
            echo " │    ┌┴  \n";
            echo " │    │   \n";
            echo " │ \n";
            echo " └───────── \n";
        break;
        }
    }


/******************************************/
/************** PROGRAMA PRINCIAL *********/
/******************************************/

//$opcion, $min, $maximo, $indiceAleatorioPrincipal $jugarPrincipal,$indiceJuegoPrincipal, $puntosUsuarioPrincipal, $primerJuego INT
//$coleccionJuegosPrincipal, $coleccionPalabrasPrincipal ARRAY

define("CANT_INTENTOS", 6); //Constante en php para cantidad de intentos que tendrá el jugador para adivinar la palabra.
$coleccionPalabrasPrincipal=cargarPalabras();//almaceno el arreglo coleccionPalabras
$coleccionJuegosPrincipal=cargarJuegos();//almaceno el arreglo coleccionJuegos

do{
    $opcion = seleccionarOpcion();
    switch ($opcion) {
    case 1: //Jugar con una palabra aleatoria
            $cantIntentos=CANT_INTENTOS;
            $min=0;
            $maximo=count($coleccionPalabrasPrincipal)-1;
            $indiceAleatorioPrincipal=indiceAleatorioEntre($min,$maximo);
            $jugarPrincipal=jugar($coleccionPalabrasPrincipal, $indiceAleatorioPrincipal, $cantIntentos);
            $coleccionJuegosPrincipal = agregarJuego($coleccionJuegosPrincipal,$jugarPrincipal,$indiceAleatorioPrincipal);
            
        break;
    case 2: //Jugar con una palabra elegida
            $cantIntentos=CANT_INTENTOS;
            $min=0;
            $maximo=count($coleccionPalabrasPrincipal)-1;
            $indiceJuegoPrincipal = solicitarIndiceEntre($min, $maximo);
            $jugarPrincipal=jugar($coleccionPalabrasPrincipal, $indiceJuegoPrincipal, $cantIntentos);
            $coleccionJuegosPrincipal = agregarJuego($coleccionJuegosPrincipal,$jugarPrincipal,$indiceJuegoPrincipal);
            
        break;
    case 3: //Agregar una palabra al listado
        $coleccionPalabrasPrincipal=agregarPalabra($coleccionPalabrasPrincipal);
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
            $indiceJuegoPrincipal= juegoConMasPuntaje($coleccionJuegosPrincipal);
            mostrarJuego($coleccionJuegosPrincipal,$coleccionPalabrasPrincipal,$indiceJuegoPrincipal);
        break;
    case 6: //Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario
            $puntosUsuarioPrincipal = ingresarPuntosUsuario();
            $primerJuego = primerJuegoConMasPuntaje($coleccionJuegosPrincipal,$puntosUsuarioPrincipal);
            if ($primerJuego > -1){
                echo "el Juego con mas Puntaje que: ".$puntosUsuarioPrincipal."\n";
                mostrarJuego($coleccionJuegosPrincipal,$coleccionPalabrasPrincipal,$primerJuego);
            }else{
                echo "No existe un juego que tenga mas de".$puntosUsuarioPrincipal."\n";
                echo "Segun enunciado retorno ".$primerJuego."\n";
            }

        break;
    case 7: //Mostrar la lista de palabras ordenada por orden alfabetico
            mostrarPalabrasOrdenadas($coleccionPalabrasPrincipal);
        break;
    }
}while($opcion != 8);

/**switch: La sentencia switch es similar a una serie de sentencias IF en la misma expresión. 
En muchas ocasiones, es posible que se quiera comparar la misma variable (o expresión) con muchos valores diferentes, 
y ejecutar una parte de código distinta dependiendo de a que valor es igual. 
Para esto es exactamente la expresión switch.
*/