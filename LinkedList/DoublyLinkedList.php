<?php

class DoublyNode
{
    public $item;
    public $next;
    public $prev;

    public function __construct($item)
    {
        $this->next = $this->prev = null;
        $this->item = $item;
    }
}

class DoublyLinkedList
{
    private $head;
    public $tail;
    private int $length;

    public function __construct()
    {
        $this->head = $this->tail = null;
        $this->length = 0;
    }

    private function isEmpty()
    {
        return $this->length == 0 || $this->head == null;
    }

    public function insertFirst($element)
    {
        $newNode = new DoublyNode($element);

        if ($this->isEmpty()) {
            $this->head = $this->tail = $newNode;
            $newNode->next = $newNode->prev = null;
        } else {
            $newNode->next = $this->head;
            $newNode->prev = null;
            $this->head = $newNode;
        }

        $this->length++;
    }

    public function insertLast($element)
    {
        $newNode = new DoublyNode($element);
        if ($this->isEmpty()) {
            $this->head = $this->tail = $newNode;
            $newNode->next = $newNode->prev = null;
        } else {
            $newNode->next = null;
            $newNode->prev = $this->tail;
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }

        $this->length++;
    }

    public function insertAt($element, int $pos)
    {
        if ($pos < 0 || $pos > $this->length)
            echo "Out Of Range\n";
        else {
            $newNode = new DoublyNode($element);
            if ($pos == 1)
                $this->insertFirst($element);
            elseif ($pos == $this->length)
                $this->insertLast($element);
            else {
                $current = $this->head;
                for ($i = 1; $i < $pos - 1; $i++) {
                    $current = $current->next;
                }

                $newNode->next = $current->next;
                $newNode->prev = $current;
                $current->next = $newNode;
                $current->next->prev = $newNode;
                $this->length++;
            }
        }
    }

    public function deleteFirst()
    {
        if ($this->isEmpty()) {
            echo "List Is Empty\n";
            return;
        }

        if ($this->length == 1) {
            $this->head = $this->tail = null;
            $this->length--;
        } else {
            $this->head = $this->head->next;
            $this->prev = null;
            $this->length--;
        }
    }

    public function deleteLast()
    {
        if ($this->isEmpty()) {
            echo "List Is Empty\n";
            return;
        }

        if ($this->length == 1) {
            $this->head = $this->tail = null;
            $this->length--;
        } else {
            $this->tail = $this->tail->prev;
            $this->tail->next = null;
            $this->length--;
        }
    }


    public function delete($item)
    {
        if ($this->isEmpty()) {
            echo "List empty\n";
            return;
        }

        if ($this->head->item == $item) {
            $this->deleteFirst();
        } else {
            $current = $this->head->next;
            while ($current != null) {
                if ($current->item == $item) {
                    break;
                }
                $current = $current->next;
            }

            if ($current == null) {
                echo "item not found\n";
                return;
            } elseif ($current->next == null) {
                $this->deleteLast();
                return;
            } else {
                $current->prev->next = $current->next;
                $current->next->prev = $current->prev;
                $this->length--;
            }
        }
    }


    public function display()
    {
        $current = $this->head;
        while ($current !== null) {
            echo $current->item . " ";
            $current = $current->next;
        }
    }
}


$doublyList = new DoublyLinkedList();

$doublyList->insertFirst(20);
$doublyList->insertFirst(30);
$doublyList->insertLast(100);
$doublyList->insertLast(300);
$doublyList->insertAt(5000, 3);
// $doublyList->deleteFirst();
// $doublyList->deleteLast();
$doublyList->delete(30);
$doublyList->display();
