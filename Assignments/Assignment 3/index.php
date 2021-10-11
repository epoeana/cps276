<!DOCTYPE html>
<html lang="en">
    <body>
<?php
require_once "Calculator.php";
$Calculator = new Calculator();
try{
echo $Calculator->calc("/", 10, 0);
echo $Calculator->calc("*", 10, 2);
echo $Calculator->calc("/", 10, 2);
echo $Calculator->calc("-", 10, 2);
echo $Calculator->calc("+", 10, 2);
echo $Calculator->calc("*", 10);
echo $Calculator->calc(10);
}
catch(ArgumentCountError $e)
{
    echo "You must enter a string and two numbers \n";
}
?>
</body>
</html>