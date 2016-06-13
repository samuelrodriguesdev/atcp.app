<?php
namespace App\Helpers;
class Helper {

	public function formatArray($array=[])
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
}