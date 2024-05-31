<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
    <input type="text" name="num1">
    <select name="operator" id="operators">
        <option value="add">+</option>
        <option value="subs">-</option>
        <option value="multi">X</option>
        <option value="divide">/</option>
        <option value="modulus">%</option>
        <option value="expo">**</option>
    </select>
    <input type="text" name="num2">
    <button>Submit</button>
   </form>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //grabData 
        $number1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
        $number2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);


        //error handle
        $errors = false;
        if(empty($number1) || empty($number2) || empty($operator)){
            echo "<h4 class='error'>Empty values are not allow!</h4>";
            $errors = true;
        }else{
            if(!is_numeric($number1) || !is_numeric($number2) ){
                echo "<h4 class='error'>Not a NaN!</h4>";
                $errors = true; 
            }
        }
        

        //result print
        if(!$errors){
            switch($operator){
                case "add":
                    $sum = $number1 + $number2;
                    echo "<h4 class='result'>Result: " .$sum. "</h4>";
                    break;
                
                case "subs":
                    $subs = $number1 - $number2;
                    echo "<h4 class='result'>Result: " .$subs. "</h4>";
                    break;
                
                case "multi":
                    $multi = $number1 * $number2;
                    echo "<h4 class='result'>Result: " .$multi. "</h4>";
                    break;

                case "divide":
                    $divide = $number1 / $number2;
                    $formatted = number_format($divide, 3);
                    echo "<h4 class='result'>Result: " .$formatted. "</h4>";
                    break;

                case "modulus":
                    $modu = $number1 % $number2;
                    echo "<h4 class='result'>Result: " .$modu. "</h4>";
                    break;

                case "expo":
                    $expo = $number1 ** $number2;
                    echo "<h4 class='result'>Result: " .$expo. "</h4>";
                    break;
            }
        }
    }

?>