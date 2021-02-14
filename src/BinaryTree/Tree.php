<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\BinaryTree;

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
            $this->root = $newNode;

            return $this;
        }

        $parent = $this->root;
        while (true) {
            if ($data < $parent->data) {
                if (null === $parent->left) {
                    $parent->left = $newNode;

                    return $this;
                }

                $parent = $parent->left;
            } else {
                if (null === $parent->right) {
                    $parent->right = $newNode;

                    return $this;
                }

                $parent = $parent->right;
            }
        }

        return $this;
    }
}