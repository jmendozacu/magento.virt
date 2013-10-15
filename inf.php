<?php

$a = (0.1 + 0.7) * 10; var_dump($a); printf("%.20f", $a);
for($i = 10; $i <=18 ; $i++) {
    echo '$i: ' . $i . '<br>';
    ini_set('precision', $i);
    var_dump($a); printf("%.14f", $a);
}
?>
