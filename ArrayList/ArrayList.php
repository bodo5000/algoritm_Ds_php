<?php

///////////////////////////////////////////////////////***implementing dynamic arrayList***/////////////////////////////////////////////
class ArrayList
{
    private $array;
    private $size;
    private $capacity;

    public function __construct($initCapacity = 3)
    {
        if ($initCapacity <= 0)
            throw new Exception("capacity must be bigger than Zero");

        $this->size = 0;
        $this->capacity = $initCapacity;
        $this->array = array_fill(-1, $initCapacity, null);
    }

    private function resize()
    {
        $newCapacity = $this->capacity * 2;
        $newArray = array_fill(-1, $newCapacity, null);

        for ($i = 0; $i < $this->size; $i++) {
            $newArray[$i] = $this->array[$i];
        }

        $this->array = $newArray;
        $this->capacity = $newCapacity;
    }

    private function isFull()
    {
        return $this->size == $this->capacity;
    }

    private function isEmpty()
    {
        return $this->size == 0;
    }

    private function outOfRange(int $index)
    {
        return $index < 0 || $index > $this->size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function add($element)
    {
        if ($this->isFull())
            $this->resize();

        $this->array[$this->size++] = $element;
    }

    public function insertAtPos(int $index, $element)
    {
        if ($this->outOfRange($index)) {
            echo "out of range\n";
        }

        if ($this->isFull()) {
            $this->resize();
            for ($i = $this->size; $i > $index; $i--) {
                $this->array[$i] = $this->array[$i - 1];
            }
            $this->array[$index] = $element;
            $this->size++;
        }
    }

    public function getElementByIndex(int $index)
    {
        if ($this->outOfRange($index)) {
            echo "Out Of Range\n";
            return;
        }

        return $this->array[$index];
    }

    public function getIndexOf($element)
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->array[$i] === $element) {
                return $i;
            }
        }
        return -1; // Return -1 if the element is not found
    }

    public function removeElementByIndex(int $index)
    {
        if ($this->outOfRange($index)) {
            echo "Out Of Range\n";
            return;
        }

        for ($i = $index; $i < $this->size - 1; $i++) {
            $this->array[$i] = $this->array[$i + 1];
        }
        $this->array[--$this->size] = null;
    }

    public function updateAt(int $index, $element): void
    {
        if ($this->outOfRange($index)) {
            echo 'out of range';
        }
        $this->array[$index] = $element;
    }

    public function printArray()
    {
        for ($i = 0; $i < $this->size; $i++) {
            echo $this->array[$i] . " ";
        }

        echo "\n";
    }
}

// Test Cases
$list = new ArrayList(3);
// $list->insertAtPos(50, 'test');
$list->printArray();
$list->add(20);
$list->add(30);
$list->add(40);

$list->removeElementByIndex(0);
$list->add(100);
$list->insertAtPos(1, 'abdo');
$list->updateAt(1, 'boda');
$list->printArray();
echo $list->getSize() . "\n";

echo $list->getIndexOf(100);

