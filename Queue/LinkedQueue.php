<?php

class QueueNode
{
    public mixed $item;
    public $next;

    public function __construct(mixed $item)
    {
        $this->item = $item;
        $this->next = null;
    }
}

class LinkedQueue
{
    public $front;
    public $rear;
    public $count;

    public function __construct()
    {
        $this->front = $this->rear = null;
        $this->count = 0;
    }

    private function isEmpty()
    {
        return $this->front == null || $this->rear == null;
    }

    public function enQueue($item)
    {
        $temp = new QueueNode($item);

        if ($this->isEmpty()) {
            $this->front = $this->rear = $temp;
            $this->count++;
            return;
        }

        $this->rear->next = $temp;
        $this->rear = $temp;
        $this->count++;
    }

    public function deQueue()
    {
        if ($this->isEmpty()) {
            echo "queue is Empty\n";
            return;
        }
        $this->front = $this->front->next;
        $this->count--;
    }

    public function getFront()
    {
        if (!$this->isEmpty())
            return $this->front->item;

        echo "Queue is Empty";
    }

    public function getRear()
    {
        if (!$this->isEmpty())
            return $this->rear->item;

        echo "Queue is Empty";
    }

    public function printQueueData()
    {
        if ($this->isEmpty()) {
            echo "Queue is Empty\n";

        } else {
            $current = $this->front;
            while ($current != null) {
                echo "{$current->item}\n";
                $current = $current->next;
            }
        }
    }
}


$linkedQueue = new LinkedQueue();

$linkedQueue->enQueue(22);
$linkedQueue->enQueue(33);
$linkedQueue->enQueue(55);
// $linkedQueue->deQueue();
// $linkedQueue->deQueue();
// $linkedQueue->deQueue();

// echo $linkedQueue->count . "\n";

// echo $linkedQueue->getFront() . "\n";
// echo $linkedQueue->getRear() . "\n";

$linkedQueue->printQueueData();