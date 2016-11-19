<?php
/*
PHP script by IcedLemonTea_
Please do not distribute without my permission.
*/
echo"Please enter the numbers(use space to separate):\n";
$no=readline();
$list = explode(" ",$no);
$times = count_words($no);
$count = count($list);
sort($list);

echo "No. of values: ".$times."\n";

echo "Sorted Value:";
foreach($list as $value) {
	echo $value." ";
}

echo "\nLower Quartile:".quartiles($list,$count,$times,"all")[0];
echo "\nMedian:".quartiles($list,$count,$times,"all")[1];
echo "\nUpper Quartile:".quartiles($list,$count,$times,"all")[2];


function quartiles($list,$count,$times,$blahblah){
	//15%4=? sth strange here
	if($times%4!=0 && $times%2==0):
		$median = ($list[($count/2)]+$list[($count/2)-1])/2;
		$quartile1 = $list[floor($count/2/2)];
		$quartile2 = $list[$count-round($count/2/2)];
	elseif($times%4==0):
		$median = ($list[($count/2)]+$list[($count/2)-1])/2;
		$quartile1 = ($list[($count/2/2)]+$list[($count/2/2)-1])/2;
		$quartile2 = ($list[$count-($count/2/2)-1]+$list[$count-($count/2/2)])/2;
	else:
		$median = $list[round($count/2)-1];
		$quartile1 = $list[floor($count/2/2)];
		$quartile2 = $list[$count-floor($count/2/2)-1];
	endif;
	
	if($blahblah == "all") {
      return array($quartile1, $median, $quartile2);
    }

    return $quartile1;
}

function readline(){
    $fr=fopen("php://stdin","r"); 
    $input = fgets($fr,128);       
    $input = rtrim($input);      
    fclose ($fr);                   
    return $input;                
}

function count_words($no) {
 $time = count(explode(" ",$no));
 return $time;
 }
?>