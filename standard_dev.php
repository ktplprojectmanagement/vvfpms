<?php
$b = $_POST['array_data'];
$value = explode(',',$b);
//print_r($a);die();
//$a = array($_POST['array_data']);
function standard_deviation_sample(array $a)
{
  $the_mean = array_sum($a) / count($a);

  return sqrt(array_reduce($a, function($result, $item) use ($the_mean) {
    return $result + pow($item - $the_mean, 2);
  }, 0) / (count($a) - 1));
}

$mean = '';$mean_value = '';
for ($i=0; $i < count($value); $i++) { 
	if ($mean_value == '') {
		$mean_value = $value[$i];
	}
	else
	{
		$mean_value = $mean_value+$value[$i];
	}
}
$mean = $mean_value/count($value);
$std_dev = standard_deviation_sample($value);
print_r($mean.';'.$std_dev);
?>