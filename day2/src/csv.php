<?php
$h = fopen('../uploads/csv-example.csv','w+');
$data = [
    [1, "Titolo 1", "Contenuto molto lungo"],
    [2, "Titolo 2", "Contenuto molto breve"],
];

foreach($data as $row) {
    fputcsv($h, $row);
}


