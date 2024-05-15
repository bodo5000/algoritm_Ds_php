<?php

/**
 *  other example to use stack:
 *   Input Postfix expression must be in a desired format.
 *   Operands and operator, both must be single character.
 *   Only '+'  ,  '-'  , '*', '/' (for exponentiation)  operators are expected.
 */

class Stack
{
    private $size;
    private $data;
    private $top;
    public function __construct($size)
    {
        $this->size = $size;
        $this->data = array();
        $this->top = -1;
    }

    public function push($element)
    {
        if ($this->top == ($this->size - 1)) {
            throw new Exception("Error: Stack is full");
        }
        $this->data[++$this->top] = $element;
    }

    public function pop(): string
    {
        if ($this->isempty()) {
            throw new Exception("Error: Stack is empty");
        }
        return $this->data[$this->top--];
    }

    public function top(): string
    {
        return $this->data[$this->top];
    }

    public function isempty(): bool
    {
        if ($this->top == -1)
            return true;

        return false;
    }
}

function evaluatePostfix($string)
{
    $stack = new Stack(strlen($string));

    $num = ""; // to handle multiple digits 

    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] == " " || $string[$i] == ",")
            continue;

        if (is_numeric($string[$i])) {
            if ($string[$i + 1] == " " || $string[$i + 1] == ",") { //to handle multiple digits
                $num .= $string[$i];
                $stack->push($num);
                $num = "";
            } else {
                $num .= $string[$i];
                continue;
            }
        } else {
            $op2 = $stack->pop();
            $op1 = $stack->pop();
            switch ($string[$i]) {
                case "*":
                    $newop = $op1 * $op2;
                    break;
                case "/":
                    $newop = $op1 / $op2;
                    break;
                case "+":
                    $newop = $op1 + $op2;
                    break;
                case "-":
                    $newop = $op1 - $op2;
                    break;
            }
            $stack->push($newop);
        }
    }
    if (!$stack->isempty())
        return $stack->top();
}

$expression = "1 2 + 3 *"; // "(1 + 2) * 3";
echo evaluatePostfix($expression) . "\n";
$expression = "1 2 3 * +"; // "1 + (2 * 3)";
echo evaluatePostfix($expression) . "\n";
$expression = "180 9 2 - * 4 5 * 2 2 * / +"; // "18 * (9-2) + ( (4*5) / (2*2) )"
echo evaluatePostfix($expression) . "\n";

