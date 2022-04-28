<?php
//$_FILES ['tmp_name'];
var_dump($_FILES);
// $slices = explode('.', $_FILES['f']]['name']);
#ext = count($slices) ? ".{$slices[count($slices)-1]}" : '';
// $fileName = uniqid().$ext;
move_uploaded_file($_FILES['f']['tmp_name'],"{$_SERVER['DOCUMENT_ROOT']}/day2/uploads/{$_FILES['f']['name']}");

//$slice[count($slices)-1];
//nomecomplicato.boh.pdf