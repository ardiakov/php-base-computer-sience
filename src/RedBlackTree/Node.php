<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\RedBlackTree;

use Ardiakov\PhpBase\RedBlackTree\Exceptions\R3ChildForRedParentMustBeBlack;
use RuntimeException;

/**
 * Class Node
 *
 * Правила красно-черных деревьев!
 * 1. Каждый узел окращен в красный либо черный цвет.
 * 2. Корень всегда окрашен в черный цвет.
 * 3. Если узел красный, то его потомки должны быть черными.
 * 4. Все пути от корня к узлу или пустому потомку должны содержать одинаковое кол-во черных узлов.
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class Node
{
    public $data;

    /**
     * @var Node|null
     */
    public ?Node $left = null;

    /**
     * @var Node|null
     */
    public ?Node $right = null;

    private bool $isRed = false;

    private bool $isBlack = false;

    public function __construct($data, ?Node $left = null, ?Node $right = null)
    {
        $this->data = $data;
        $this->left = $left;
        $this->right = $right;

        $this->markRed();
    }

    public function markRed(): void
    {
        $this->isRed = true;
        $this->isBlack = false;
    }

    public function markBlack(): void
    {
        $this->isRed = false;
        $this->isBlack = true;
    }

    public function isBlack(): bool
    {
        return $this->isBlack;
    }

    public function isRed(): bool
    {
        return $this->isRed;
    }

    public function refill(): void
    {
        $this->markBlack();

        if (null !== $this->left) {
            $this->left->markBlack();
        }

        if (null !== $this->right) {
            $this->right->markBlack();
        }
    }

    /**
     * @throws R3ChildForRedParentMustBeBlack
     *
     * @return void
     */
    public function validateChildColorsBeforeInsert(): void
    {
        if (false === $this->isRed()) {
            return;
        }

        if ($this->left === null || $this->right === null) {
            return;
        }

        if (false === $this->left->isBlack()) {
            throw new R3ChildForRedParentMustBeBlack();
        }

        if (false === $this->right->isBlack()) {
            throw new R3ChildForRedParentMustBeBlack();
        }
    }

    public function color(): string
    {
        if (true === $this->isBlack()) {
            return 'black';
        }

        if (true === $this->isRed()) {
            return 'red';
        }

        throw new RuntimeException();
    }
}