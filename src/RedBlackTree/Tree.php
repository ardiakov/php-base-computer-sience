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

        $parent = $this->root;
        while (true) {
            if ($data < $parent->data) {
                if (null === $parent->left) {
                    if ($parent->isBlack() === false) {
                        throw new R2RootMustBeBlack();
                    }

                    $parent->left = $newNode;

                    return $this;
                }

                $parent = $parent->left;
            } else {
                if (null === $parent->right) {
                    if ($parent->isBlack() === false) {
                        throw new R2RootMustBeBlack();
                    }

                    $parent->right = $newNode;

                    return $this;
                }

                $parent = $parent->right;
            }
        }

        return $this;
    }


    /**
     * Поиск элемента
     *
     * @param $value
     *
     * @return Node|null
     */
    public function find($value): ?Node
    {
        if (null === $this->root) {
            return null;
        }

        $current = $this->root;

        while ($current !== null) {
            if ($value === $current->data) {
                return $current;
            }

            if ($value < $current->data) {
                $current = $current->left;
            } else {
                $current = $current->right;
            }
        }

        return null;
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

        return true;
    }

    public function validateBlackHeight(): void
    {
       $travers = function (?Node $node) use (&$travers) {
           if (null === $node) {
               return;
           }

           echo PHP_EOL. $node->data ." " .$node->color();

           if ($node->left !== null) {
               $travers($node->left);
           }

           if ($node->right !== null) {
               $travers($node->right);
           }
       };

       $travers($this->root);
    }
}