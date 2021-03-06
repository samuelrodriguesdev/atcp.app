<?php

namespace App\Helpers;

class Helper {

	public static function formatArray($array=[])
	{
		$array=array_flatten($array);
		$j=0; $sum=0; $new_array=[];
		for ($i=0;$i<count($array); $i++) {
			$j++;
			$sum+=$array[$i];
			if ($j == 3) {
				array_push($new_array, $sum);
				$sum=0;
				$j=0;
			}
		}
		return $new_array;
	}

	public static function sigla_generator($string)
	{
		$stringArray = explode(' ', $string);
		$sigla='';
	
		if ( starts_with($string, 'Centro') ) 
		{

			$sigla  ='CE ';
			$sigla .= implode(' ' , array_splice($stringArray, 3) );

		} elseif ( starts_with($string, 'Serviço') ) 
		{

			$sigla ='SE ';
			$sigla .= implode(' ' , array_splice($stringArray,3) );

		} else {
			foreach($stringArray as $key)
			{
				if(strlen($key) > 4 )
				{
					$sigla.=$key[0];
				}
			}
		}
		return $sigla;
	}
	public static function array_insert(&$array, $position, $insert)
	{
	    if (is_int($position)) {
	        array_splice($array, $position, 0, $insert);
	    } else {
	        $pos   = array_search($position, array_keys($array));
	        $array = array_merge(
	            array_slice($array, 0, $pos),
	            $insert,
	            array_slice($array, $pos)
	        );
	    }
	}
}