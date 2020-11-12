<?php
    $a = [];
    for ($i=0; $i < 51; $i++) { 
        $a[] = true;
    }
    $prima = [];
    $a[0] = false;
    $a[1] = false;
    for ($i=2; $i < 51; $i++) { 
        if($a[$i]){
            $prima[] = $i;
        }
        for ($j=$i*2; $j < 51; $j+=$i) { 
            $a[$j] = false;
        }
    }
    foreach ($prima as $value) {
        echo $value.'<br>';
    }
?>