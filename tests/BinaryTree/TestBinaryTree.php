<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\Tests\BinaryTree;

use Ardiakov\PhpBase\BinaryTree\Tree;
use PHPUnit\Framework\TestCase;

/**
 * Class TestBinaryTree
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class TestBinaryTree extends TestCase
{
    public function testFind(): void
    {
        $tree = new Tree();
        $tree
            ->add(5)
            ->add(15)
            ->add(3)
            ->add(25)
        ;

        $this->assertEquals(25, $tree->find(25));
    }

    public function testInOrderTraverse(): void
    {
        $tree = new Tree();
        $this->assertEquals([], $tree->inOrder());

        $tree
            ->add(5)
            ->add(15)
            ->add(3)
            ->add(25)
        ;
        $this->assertEquals([3, 5, 15, 25], $tree->inOrder());
    }

    public function testPreOrderTraverse(): void
    {
        $tree = new Tree();
        $this->assertEquals([], $tree->preOrder());

        $tree
            ->add(5)
            ->add(15)
            ->add(12)
            ->add(3)
            ->add(10)
            ->add(25)
        ;

        $this->assertEquals([5, 3, 15, 12, 10, 25], $tree->preOrder());
    }

    public function testBreadthFirst(): void
    {
        $tree = new Tree();
        $this->assertEquals([], $tree->breadthFirst());

        $tree
            ->add(5)
            ->add(15)
            ->add(12)
            ->add(3)
            ->add(10)
            ->add(25)
        ;

        var_dump($tree);

        $this->assertEquals([5, 3, 15, 12, 25, 10], $tree->breadthFirst());
    }
}