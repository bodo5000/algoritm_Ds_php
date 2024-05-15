<?php

class Stack
{
    public int $top;
    private int $size;
    private array $stack;

    public function __construct(int $size)
    {
        $this->top = -1;
        $this->size = $size;
        $this->stack = [];
    }

    // 
    public function get_top()
    {
        if ($this->isEmpty()) {
            echo "stack is Empty \n";
        } else {
            return $this->stack[$this->top];
        }
    }

    public function isEmpty(): bool
    {
        return $this->top == -1;
    }

    public function isFull(): bool
    {
        return $this->top == $this->size - 1;
    }

    public function push($value)
    {
        if (!$this->isFull()) {
            $this->stack[++$this->top] = $value;
            return $this;
        }

        echo "stack is full \n";
        return $this;

    }

    public function pop()
    {
        if (!$this->isEmpty()) {
            $this->top--;
            return $this;
        }

        echo "stack is Empty \n";
        return $this;

    }

    public function getStackData()
    {
        echo "stack: (";
        for ($i = $this->top; $i >= 0; $i--) {
            if ($i == 0)
                echo "{$this->stack[$i]}";
            else
                echo "{$this->stack[$i]}, ";
        }
        echo ")\n";
    }
}

// $stack = new Stack(3);

// $stack->push(2)->push(3)->push(10)->getStackData();
// $y = 0;

// echo 'the top of the stack is: ' . $stack->get_top();

