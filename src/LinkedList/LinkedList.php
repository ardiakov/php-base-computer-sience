<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\LinkedList;

use phpDocumentor\Reflection\Types\Mixed_;

/**
 * Class LinkedList
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class LinkedList
{
    /**
     * Начало списка
     *
     * @var Item|null
     */
    private ?Item $head = null;

    /**
     * Размерность списка
     *
     * @var int
     */
    private int $counter = 0;

    /**
     * Добавление элемента
     *
     * @param int $data
     *
     * @return void
     */
    public function addNode(int $data): void
    {
        $item = new Item($data);

        if (null !== $this->head) {
            $item->next = $this->head;
        }

        $this->head = $item;
        $this->counter++;
    }

    /**
     * Отобразить список элементов
     *
     * @return array
     */
    public function displayData(): array
    {
        $current = $this->head;

        $allData = [];

        while ($current !== null) {
            $allData[] = $current->data();
            $current = $current->next;
        }

        return $allData;
    }

    /**
     * Удаление одного элемента по значению
     *
     * @param $value
     *
     * @return void
     */
    public function deleteByValue($value): void
    {
        $current = $this->head;

        if (null === $current) {
            return;
        }

        $previous = null;

        while ($current !== null) {
            $next = $current->next;
            if ($current->data() === $value) {
                if ($previous === null) {
                    $this->head = $next;
                } else {
                    $previous->next = $next;
                }

                $this->counter--;
            }

            $previous = $current;
            $current = $current->next;
        }
    }

    /**
     * Количество элементов списка
     *
     * @return int
     */
    public function counter(): int
    {
        return $this->counter;
    }
}