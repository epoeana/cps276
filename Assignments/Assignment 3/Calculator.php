<?php
class Calculator
    {
           
        function calc($operator, $numb1, $numb2)
        {
           switch($operator)
           {
            case "+":
                $output = $numb1 + $numb2;
                echo nl2br("The sum of the numbers is $output \n");
                break;
            case "-":
                $output = $numb1 - $numb2;
                echo nl2br("The difference of the numbers is $output \n");
                break;
            case "/":
                try 
                {
                $output = $numb1/$numb2;
                echo nl2br("The division of the numbers is $output \n");
                }
                catch(DivisionByZeroError $e)
                {
                    echo nl2br("Cannot divide by zero \n");
                }
                break;
            case "*":
                $output = $numb1 * $numb2;
                echo nl2br("The product of the numbers is $output \n");
                break;
           }
        }
    }
?>