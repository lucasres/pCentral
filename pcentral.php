<?php

	/**
 	* biblioteca para calculos geográficos
 	*
 	* @author Lucas Resende de Sousa Amaral
 	*/

	/*
	* @param $x file txt
	* @param $y file txt
	* @return array Content as coordinates of a central point 
	*/
	function pCentral($x,$y){
	$i = 0;
	$j = 0;
	$SomaX = 0;
	$SomaY = 0;

	$arqX = $x;
	$arqY = $y;

	if ($arqX) {
    	while(!feof($arqX)) { 
	       $pntX[$i] = fgets($arqX);
	       $i++;
		}
	
  	  fclose($arqX);	
	} else {
		echo "Point file LATITUDE was not found!";
	}

	if ($arqY) {
    	while(!feof($arqY)) { 
	       $pntY[$j] = fgets($arqY);
	 	   $j++; 
		}
		
  	fclose($arqY);	
	} else {
		echo "Point file LONGITUDE was not found!";
	}

	for ($k=0; $k < $i ; $k++) { 
		$SomaX = $SomaX+$pntX[$k];
	}

	for ($k=0; $k < $j ; $k++) { 
		$SomaY = $SomaY+$pntY[$k];
	}
	$SomaX = $SomaX/$i;
	$SomaY = $SomaY/$j;
	
	return array(
		        'lat' => $SomaX,
		 	 	'lon' => $SomaY	
		     );
	}

	/*
	* @param $p1 array('x'=>valor_x,'y'=>valor_y)
	* @param $p2 array('x'=valor_y,'y'=>valor_y) 
	* @return float distance of 2 points
	*/
	function distance2PCar($p1,$p2){
		$c1 = $p1['x']-$p2['x'];
		$c2 = $p1['y']-$p2['y'];


		$c1 = $c1*$c1;
		$c2 = $c2*$c2;

		return sqrt($c1+$c2);
	}

	/*
	* @param $p1 array('lat'=>valor_lat,'lon'=>valor_lon)
	* @param $p2 array('lat'=>valor_lat,'lon'=>valor_lon) 
	* @return float distance of 2 points(km)
	*/
	function ForHaversine($p1,$p2){

	$lat1 = deg2rad($p1['lat']);
	$lat2 = deg2rad($p2['lat']);
	$lon1 = deg2rad($p1['lon']);
	$lon2 = deg2rad($p2['lon']);

	$dist = (6371 * acos( cos( $lat1 ) * cos( $lat2 ) * cos( $lon2 - $lon1 ) + sin( $lat1 ) * sin($lat2) ) );
	return $dist;

	}
	
	/*
	* @param $km float 
	* @return float Equivalent in M
	*/
	function km2m($km){
		return ($km*1000);
	}

	/*
	* @param $m float 
	* @return float Equivalent in KM
	*/
	function m2km($m){
		return ($m/1000);
	}

	/*
	* @param $nm float 
	* @return float Equivalent in KM
	*/
	function nm2km($nm){
		return m2km($nm*1852);
	}




	
?>
