<?php

class Node
{
    public mixed $value;
    public $next;

    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
    }
}

class LinkedStack
{
    public $top;
    public $height;

    public function __construct()
    {
        $this->height = 0; // counter of numbers of nodes its equal to one because we create new node in constructor
    }

    public function push($value)
    {
        $newNode = new Node($value);

        if ($this->height == 0) {
            $this->top = $newNode; // Obj [new node]
        } else {
            $newNode->next = $this->top; //next = top = Obj [old node]
            $this->top = $newNode; //  top = new node
        }
        $this->height++;
    }

    public function pop()
    {
        if ($this->height == 0) {
            return null;
        }
        $temp = $this->top;
        $this->top = $this->top->next;
        $temp->next = null;
        $this->height--;
        return $temp;
    }

    public function printStack()
    {
        $temp = $this->top;
        while ($temp != null) {
            echo $temp->value . "\n";
            $temp = $temp->next;
        }
    }
}

$s = new LinkedStack();
$s->push('google.com');
$s->push('gmail.com');
$s->pop();
$s->printStack();
