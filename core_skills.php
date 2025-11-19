<?php

$n = 10;
$a = [];

for ($i = 0; $i < $n; $i++) {
    $a[] = mt_rand(1, 20);
}

$f = array_filter($a, function ($el) use ($n) {
    return $el < $n;
});
print_r($a);
print_r($f);
