<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\RedBlackTree;

use Ardiakov\PhpBase\RedBlackTree\Exceptions\R3ChildForRedParentMustBeBlack;

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

    /**
     * @throws R3ChildForRedParentMustBeBlack
     *
     * @return void
     */
    public function validateChildColors(): void
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
}