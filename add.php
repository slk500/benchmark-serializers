<?php

$array = [];

foreach (range(1, 10) as $i) {
    $startTime = microtime(true);
    $array [] = microtime(true) - $startTime;
}


function stats_standard_deviation(array $a, $sample = false)
{
    $n = count($a);
    if ($n === 0) {
        trigger_error("The array has zero elements", E_USER_WARNING);
        return false;
    }
    if ($sample && $n === 1) {
        trigger_error("The array has only 1 element", E_USER_WARNING);
        return false;
    }
    $mean = array_sum($a) / $n;
    $carry = 0.0;
    foreach ($a as $val) {
        $d = ((double)$val) - $mean;
        $carry += $d * $d;
    };
    if ($sample) {
        --$n;
    }
    return sqrt($carry / $n);
}

array_walk($array, function(&$v) {$v *= 1000000;});

echo stats_standard_deviation($array);
print_r($array);

