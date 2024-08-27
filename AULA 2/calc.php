<?php
    $v1 = $_GET["a"];
    $v2 = $_GET["b"];
    $op = $_GET["op"];

    $result = 0;

    if ($v2 == NULL){
        $v2 = 0;
    }
    if ($v1 == NULL){
        $v1 = 0;
    }

    switch ($op)
    {
        case "+":
            $result = $v1 + $v2;
            break;

        case "-":
            $result = $v1 - $v2;
            break;

        case "*":
            $result = $v1 * $v2;
            break;

        case "/":
            $result = $v1 / $v2;
            break;
        
        case "sqrt":
            $result = sqrt($v1);
            $result2 = sqrt($v2);
            break;

        case "+/-":
            $result = $v1 *(-1);
            $result2 = $v2 *(-1);
            break;

        case "1/x":
            $result = 1 / $v1;
            $result2 = 1 / $v2;
            break;

        case "sen":
            $result = sin(deg2rad($v1));
            $result2 = sin(deg2rad($v2));
            break;

        case "cos":
            $result = cos(deg2rad($v1));
            $result2 = cos(deg2rad($v2));
            break;

        case "tan":
            $result = tan(deg2rad($v1));
            $result2 = tan(deg2rad($v2));
            break;
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(($op == "+") || ($op == "-") || ($op == "/") || ($op == "*"))
        {
            echo "<h1>$op: $result</h1>"; 
        }else{
            echo "<h1>A: $result</h1><br><h1>B: $result2</h1>"; 
        } 
    ?>
</body>
</html>