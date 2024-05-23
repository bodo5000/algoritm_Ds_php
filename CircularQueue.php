<?php

// using queue with array list and circularQueue

class CircularQueue
{
    private int $front;
    private int $rear;
    private int $count;
    private int $size;
    private array $queue;

    public function __construct(int $size)
    {
        $this->front = 0;
        $this->size = $size;
        $this->rear = $size - 1;
        $this->count = 0;
        $this->queue = [];
    }

    private function isEmpty(): bool
    {
        return $this->count == 0;
    }

    private function isFull(): bool
    {
        return $this->count == $this->size;
    }

    private function circularQueue(int $number): int
    {
        return ($number + 1) % $this->size;
    }

    public function enQueue($element): void
    {
        if ($this->isFull())
            echo "Queue is Full \n";
        else {
            $this->rear = $this->circularQueue($this->rear);
            $this->queue[$this->rear] = $element;
            $this->count++;
        }
    }

    public function deQueue(): void
    {
        if ($this->isEmpty())
            echo "Queue is Empty \n";
        else {
            $this->front = $this->circularQueue($this->front);
            $this->count--;
        }
    }

    public function getFront(): string|int|float|bool
    {
        if (!$this->isEmpty())
            return $this->queue[$this->front];

        echo "queue is empty \n";
        return false;
    }

    public function getRear(): string|int|float|bool
    {
        if (!$this->isEmpty())
            return $this->queue[$this->rear];

        echo "queue is empty \n";
        return false;
    }

    public function printQueue(): void
    {
        if (!$this->isEmpty()) {
            for ($i = $this->front; $i != $this->rear; $i = $this->circularQueue($i)) {
                echo $this->queue[$i] . "\n";
            }
            echo $this->queue[$this->rear] . "\n";
        } else
            echo "empty Queue \n";
    }
}

// Testing
$q = new CircularQueue(3);

$q->enQueue(20);
$q->enQueue(30);
$q->enQueue(40);
$q->deQueue();
$q->enQueue(50);
echo 'front is: ' . $q->getFront() . "\n";
echo 'rear is: ' . $q->getRear() . "\n";
$q->printQueue();