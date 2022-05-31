<?php
$num1 = "1.100,55";
function parseFloat($str)
{
    if (strstr($str, ",")) {
        $str = str_replace(".", "", $str); // replace dots (thousand seps) with blancs
        $str = str_replace(",", ".", $str); // replace ',' with '.'
    }

    if (preg_match("#([0-9\.]+)#", $str, $match)) { // search for number that may contain '.'
        return floatval($match[0]);
    } else {
        return floatval($str); // take some last chances with floatval
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Resultado: <?php echo parseFloat($num1); ?></h1><br>
</body>

</html>