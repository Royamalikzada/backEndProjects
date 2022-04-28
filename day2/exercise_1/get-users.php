<?php
$h = fopen('../uploads/csv-users.csv', 'r+');
while (($myArray = fgetcsv($h)) !== FALSE){
    var_dump($myArray);
};

