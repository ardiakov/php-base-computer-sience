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

    /**
     * Поиск элемента
     *
     * @param $value
     *
     * @return int|null
     */
    public function find($value): ?int
    {
        if (null === $this->root) {
            return null;
        }

        $current = $this->root;

        while ($current !== null) {
            if ($value === $current->data) {
                return $current->data;
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
     * Симетричный обход (по возрастанию в двоичном дереве)
     *
     * @return array
     */
    public function inOrder(): array
    {
        if (null === $this->root) {
            return [];
        }

        $result = [];
        $travers = function (Node $node) use (&$result, &$travers) {
            if (null !== $node->left) {
                $travers($node->left);
            }

            $result[] = $node->data;

            if (null !== $node->right) {
                $travers($node->right);
            }
        };

        $travers($this->root);

        return $result;
    }

    /**
     * Прямой обход (лево-право)
     *
     * @return array
     */
    public function preOrder(): array
    {
        if (null === $this->root) {
            return [];
        }

        $result = [];
        $travers = function (Node $node) use (&$result, &$travers) {
            $result[] = $node->data;

            if (null !== $node->left) {
                $travers($node->left);
            }

            if (null !== $node->right) {
                $travers($node->right);
            }
        };

        $travers($this->root);

        return $result;
    }

    /**
     * Обход дерева в ширину
     */
    public function breadthFirst(): array
    {
        if (null === $this->root) {
            return [];
        }

        $queue = [];
        $result = [];

        array_push($queue, $this->root);

        while ($queue !== []) {
            $node = array_shift($queue);
            $result[] = $node->data;

            if (null !== $node->left) {
                array_push($queue, $node->left);
            }

            if (null !== $node->right) {
                array_push($queue, $node->right);
            }
        }

        return $result;
    }
}