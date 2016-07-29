<?php
	/*
	* @param $x file txt
	* @param $y file txt
	*/

	function pCentral($x,$y){
	//variaveis
	$i = 0;
	$j = 0;
	$SomaX = 0;
	$SomaY = 0;
	//chamando a abertura do arquivo
	$arqX = $x;
	$arqY = $y;
	//lendo o que ha no arquivo X
	if ($arqX) {
    	while(!feof($arqX)) { 
	       $pntX[$i] = fgets($arqX);
	       $i++;
		}
	
  	  fclose($arqX);	
	} else {
		echo "Arquivo de pontos X não foi encontrado!";
	}
	//lendo o que ha no arquivo Y
	if ($arqY) {
    	while(!feof($arqY)) { 
	       $pntY[$j] = fgets($arqY);
	 	   $j++; 
		}
		
  	fclose($arqY);	
	} else {
		echo "Arquivo de pontos Y não foi encontrado!";
	}
	//somatorio X
	for ($k=0; $k < $i ; $k++) { 
		$SomaX = $SomaX+$pntX[$k];
	}
	//somatorio Y
	for ($k=0; $k < $j ; $k++) { 
		$SomaY = $SomaY+$pntY[$k];
	}
	$SomaX = $SomaX/$i;
	$SomaY = $SomaY/$j;
	
	return array('x' => $SomaX,
				 'y' => $SomaY	
				);
}

$teste = pCentral(fopen("pontosX.txt","r"),fopen("pontosY.txt","r"));

var_dump($teste);
	
?>