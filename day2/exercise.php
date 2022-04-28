<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Min number</title>
</head>
<body>

    <?php

        $n = [20, 10, 15, 77, 32];  

        for($i=0; $i<count($n)-1; $i++) {
            for($j=0; $j<count($n)-1; $j++) {
                if($n[$j] < $n[$j+1]){
                    $min = $n[$j];
                    $n[$j+1]= $n[$j];
                }
            }
        }
        echo $min;

        echo "<br>";

        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

        function orderArray(){
            $n = [20, 10, 15, 77, 32];
            $arr=[];
            for($i=0; $i<=1000; $i++){
                if(in_array($i,$n)){
                    $arr[]+=($i);
                }
            }
            return $arr;
        }
        $ordArr = orderArray();
        echo $ordArr[0];


        echo "<br>";

        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

        $n = [20, 10, 15, 77, 32];
        sort($n);
        echo $n[0];

        echo "<br>";

        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        /**
         * Returns the min number found in the given $numbers array
         * 
         * @param array $numbers
         * @return int the min value found
         */
        function myMin(array $numbers): int {
            if (!count($numbers)) {
                throw new Exception('Empty array not allowed');
            }
            $min = $numbers[0];
            foreach($numbers as $number) {
                if ($number < $min) {
                    $min = $number;
                }
            }
            return $min;
        }
        $numbers = [30, 12, 8, 45, 1, 6];
        echo myMin($numbers);
        try {
            echo myMin([]);
        } catch(Exception $e) {
            echo "Exception handled! {$e->getMessage()}";
        }
        // Avendo gestito l'eccezione, l'esecuzione dello script non si interrompe
        // e posso proseguire con le righe successive dello script
        echo "Righe successive";


        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

        $numbers = [30, 12, 8, 45, 1, 6];
        function m(array $array, int $m =null){
            m($a);
            m($a,8)
        }
    ?>
    
</body>
</html>