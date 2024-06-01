<?php

class LinkedNode
{
    public $item;
    public $next;

    public function __construct($item)
    {
        $this->next = null;
        $this->item = $item;
    }
}
class LinkedList
{
    private $head;
    private $tail;
    private int $length;

    public function __construct()
    {
        $this->head = $this->tail = null;
        $this->length = 0;
    }

    public function isEmpty(): bool
    {
        return $this->length == 0 || $this->head == null;
    }

    public function insertFirst($item): void
    {
        $newNode = new LinkedNode($item);

        if ($this->isEmpty()) {
            $this->head = $this->tail = $newNode;
        } else {
            $newNode->next = $this->head;
            $this->head = $newNode;
        }

        $this->length++;
    }

    public function insertLast($item): void
    {
        $newNode = new LinkedNode($item);

        if ($this->isEmpty()) {
            $this->head = $this->tail = $newNode;
        } else {
            $this->tail->next = $newNode;
            $newNode->next = null;
            $this->tail = $newNode;
        }

        $this->length++;
    }

    public function insertAt($pos, $item): void
    {
        if ($pos < 0 || $pos > $this->length)
            echo "Out Of Range\n";
        else {
            $newNode = new LinkedNode($item);
            if ($pos == 0)
                $this->insertFirst($item);
            elseif ($pos == $this->length)
                $this->insertLast($item);
            else {
                $current = $this->head;
                for ($i = 1; $i < $pos; $i++)
                    $current = $current->next;

                $newNode->next = $current->next;
                $current->next = $newNode;
                $this->length++;
            }
        }
    }

    public function deleteFirst()
    {
        if ($this->isEmpty())
            echo 'empty List';
        elseif ($this->length == 1)
            $this->length--;
        else {
            $this->head = $this->head->next;
            $this->length--;
        }

    }

    public function deleteLast()
    {
        $currentNode = $this->head->next;
        $prevNode = $this->head;

        if ($this->isEmpty()) {
            echo 'list empty';
        } elseif ($this->length == 1) {
            $this->length--;
        } else {

            while ($currentNode != $this->tail) {
                $prevNode = $currentNode;
                $currentNode = $currentNode->next;

            }

            $prevNode->next = null;
            $this->tail = $prevNode;
            $this->length--;
        }
    }

    public function delete($item)
    {
        $current = $this->head;
        $prev = NULL;

        if ($this->isEmpty()) {
            echo 'list is empty';
            return;
        }

        while ($current !== NULL) {
            if ($current->item === $item) {
                if ($prev === NULL) {
                    $this->head = $current->next;
                    $this->length--;
                } else {
                    $prev->next = $current->next;
                }
                return;
            }
            $prev = $current;
            $current = $current->next;
        }
    }

    public function reverse()
    {
        //example: from    30 -> 20 -> 100-> null     TO     null <- 30 <- 20 <- 100  head = {100, node};
        $prev = NULL;
        $current = $this->head;
        while ($current !== NULL) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }
        $this->head = $prev;
    }

    public function display()
    {
        $current = $this->head;
        while ($current !== null) {
            echo $current->item . " ";
            $current = $current->next;
        }
    }

    public function getCurrent()
    {
        return $this->head->item;
    }
}

$linked = new LinkedList();

$linked->insertFirst(20);
$linked->insertFirst(30);
$linked->insertLast(100);
$linked->insertAt(1, 33000);
$linked->insertAt(0, 5000);
$linked->insertAt(5, 200);
$linked->delete(33000);
$linked->deleteFirst();
$linked->deleteLast();
$linked->display();
echo "\n----------------\n";
$linked->reverse();

$linked->display();