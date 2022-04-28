<?php

$filePath = "{$_SERVER['DOCUMENT_ROOT']}/day2/uploads/logs.txt";
$hasFile = file_exists($filePath);
var_dump ($hasFile);
//percorso relativo '../uploads/logs.txt'

try {
    $h = fopen($filePath, 'a+');  
} catch (Exception $e){
    // die($e->getMessage());
}

fwrite($h, "Ciaone proprio!");