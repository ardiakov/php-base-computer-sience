<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\RedBlackTree;

use Ardiakov\PhpBase\RedBlackTree\Exceptions\R2RootMustBeBlack;

/**
 * Class Tree
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class Tree
{
    public ?Node $root = null;

    /**
     * Добавление элемента
     *
     * @param $data
     *
     * @return self
     */
    public function add($data): self
    {
        $newNode = new Node($data);

        if (null === $this->root) {
            $newNode->markBlack();
            $this->root = $newNode;

            return $this;
        }

        return $this;
    }

    /**
     * @throws R2RootMustBeBlack
     *
     * @return bool
     */
    public function isRootBlack(): bool
    {
        if (false === $this->root->isBlack()) {
            throw new R2RootMustBeBlack();
        }
    }
}