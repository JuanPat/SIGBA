<?php

include_once('LcsSolver.php');

set_time_limit(240);

$solver = new LcsSolver;

// //datos de entrada, numeros del baloto
// $sequenceA= array('08','10','21','30','33','36');
// $sequenceB= array('04','06','17','24','28','32');
// $sequenceC= array('06','10','12','16','22','27');
// $sequenceD= array('06','13','20','24','32','45');


// //donde se guardan los datos de entrada a procesar
// $resultados=array($sequenceA,$sequenceB,$sequenceC,$sequenceD);

//*********************************************************************
//donde se guardan los datos de entrada a procesar
 $resultados= array();


if (isset($_POST['submit'])) {
  echo "EL DATO  HA  ENTRADO";
    if (($gestor = fopen($_FILES['filename']['tmp_name'], "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
        $numero = count($datos);
        // echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
        for ($c=0; $c < $numero; $c++) {

             $number= explode('-',$datos[$c]);

             $resultados[]=$number;
           
           // echo "<pre>";
             
           //  print_r($resultados[$c]);
           //  echo "</pre>";
        }
    }
    fclose($gestor);
}
} else {
  echo "NO SE A ENCONTRADO EL DATO";
}





//*********************************************************************




//arreglo para guardar los LCS obtenidos de todos los registros ingresados
$resultlcs=array();

//se obtiene el tamaño del array que guardara los datos de entrada
$tam=count($resultados);
$i=0;
//metodo para comparar cada uno de los resultados
for(;$i<=$tam-1;$i++){

for($j=$i+1;$j<=$tam-1;$j++){

//se guarda el resultado que de vuelve el LCS
$LCS=$solver->longestCommonSubsequence($resultados[$i], $resultados[$j]);

//se almacenan en el arreglo solo los LCS con longitud mayor o igual a 3, que son los que interesan
if(count($LCS)>=5){

$resultlcs[]= $LCS;
}//cierra if




}


}
$valor= count($resultlcs); 
for ($d=0; $d <=  $valor-1; $d++) {

             $dato = implode($resultlcs[$d]);
        echo "<br>".$dato;  
       
        }

// calculates the LCS to be array('A', 'A', 'N', 'A')
//$lcs = $solver->longestCommonSubsequence($sequenceA, $sequenceB);

echo "<pre>";
// //print_r($lcs);
// //natsort($resultados);
    // print_r($resultlcs);
       
// //print_r(count($sequenceA));
echo "</pre>";
echo "<br>";
//echo count($resultados);

?>