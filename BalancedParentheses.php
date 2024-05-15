<?php

/**
 *  Example of using Stack
 *   in this example we must have valid expression when using parentheses:
 *     ex1: (5+3) *3 => is valid because we have open and closed rounded parentheses
 *     ex2: }5+(3*3){ => invalid because we have double close curly parentheses
 * 
 *  our goal to solve this problem using stack:
 *      1- we make sure that only parentheses are entered to stack
 *      2- we will push the left parentheses in our stack
 *      3- if we find the right parentheses that compatible with left parentheses 
 *      4- we will pop the left parentheses
 *      5- loop the previous operations until the ending of the expression 
 *      6- we will check the top of stack if it <= -1 using method isEmpty
 *      7- that's mean the expression is invalid
 *      8- else that's mean the expression is valid
 */

//  Solution
include ('stack.php');
function arePair($open, $close): bool
{
    if ($open == '(' && $close == ')')
        return true;
    elseif ($open == '{' && $close == '}')
        return true;
    elseif ($open == '[' && $close == ']')
        return true;

    return false;
}

function areBalanced(string $exp, Stack $stack): bool
{
    for ($i = 0; $i < strlen($exp); $i++) {
        if ($exp[$i] == '(' || $exp[$i] == '{' || $exp[$i] == '[')
            $stack->push($exp[$i]);
        elseif ($exp[$i] == ')' || $exp[$i] == '}' || $exp[$i] == ']') {
            if ($stack->isEmpty() || !arePair($stack->get_top(), $exp[$i])) {
                return false;
            }
            $stack->pop();
        }
    }

    return $stack->isEmpty() ? true : false;
}

$exp = readline("enter expression: \n");

if (areBalanced($exp, new stack(strlen($exp))))
    echo 'Balanced';
else
    echo 'UnBalanced';
