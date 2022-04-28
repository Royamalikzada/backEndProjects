<?php
$h = fopen('../uploads/csv-example.csv', 'r+');
while (($row = fgetcsv($h)) !== FALSE){
    var_dump($row);
};

