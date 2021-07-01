<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\Tests\RedBlackTree;

use Ardiakov\PhpBase\RedBlackTree\Exceptions\BlackHeightInvalid;
use Ardiakov\PhpBase\RedBlackTree\Exceptions\R2RootMustBeBlack;
use Ardiakov\PhpBase\RedBlackTree\Tree;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * Class TestBinaryTree
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class TestRedBlackTree extends TestCase
{
    public function test(): void
    {
        $tree = new Tree();
        $tree
            ->add(50);;

        // Проверяем что корень дерева черный
        $this->assertTrue($tree->isRootBlack());

        $tree
            ->add(25)
            ->add(75);

        // Проверяем что добавленные элементы красные
        $this->assertTrue($tree->find(25)->isRed());
        $this->assertTrue($tree->find(75)->isRed());

        // Прверяем что не можем добавить красный элемент к красному

        $expectedException = R2RootMustBeBlack::class;
        $exception = null;

        try {
            $tree->add(12);
        } catch (Throwable $e) {
            $exception = $e;
        }

        $this->assertInstanceOf($expectedException, $exception);

        // Перекрашиваем добавленные красные элементы в черные
        $tree->find(50)->refill();
        $this->assertTrue($tree->find(25)->isBlack());
        $this->assertTrue($tree->find(75)->isBlack());

        // Добавляем новый красный элемент
        $tree->add(12);
        $tree->add(26);
        $tree->find(26)->refill();
        $tree->add(27);

        $exception = null;
        try {
            $tree->validateBlackHeight();
        } catch (Throwable $e) {
            $exception = $e;
        }

        $this->assertInstanceOf(BlackHeightInvalid::class, $exception);


    }
}