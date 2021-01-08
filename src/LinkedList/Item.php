<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\LinkedList;

/**
 * Class Item
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class Item
{
    /**
     * Следующий элемент
     *
     * @var Item|null
     */
    public ?Item $next = null;

    /**
     * Данные
     *
     * @var int
     */
    private int $data;

    /**
     * Item constructor.
     *
     * @param int       $data
     */
    public function __construct(int $data)
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function data(): int
    {
        return $this->data;
    }
}