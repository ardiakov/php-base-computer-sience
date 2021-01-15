<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\Tests\BubbleSort;

use Ardiakov\PhpBase\BubbleSort\BubbleSort;
use PHPUnit\Framework\TestCase;

/**
 * Class BubbleSortTest
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class BubbleSortTest extends TestCase
{
    public function testWithEmptyArray(): void
    {
        $inputData = [];
        $sort = (new BubbleSort($inputData))();

        $this->assertEquals($inputData, $sort);
    }

    public function testWithOnlyOneElement(): void
    {
        $inputData = [1];
        $sort = (new BubbleSort($inputData))();

        $this->assertEquals($inputData, $sort);
    }

    public function testSort(): void
    {
        $inputData = [5, 2, 38, 16, 24, 42, 37];
        $sort = (new BubbleSort($inputData))();

        $this->assertEquals([2, 5, 16, 24, 37, 38, 42], $sort);

        $inputData = [77, 99, 44, 55, 22, 88, 11, 0, 66, 33];
        $sort = (new BubbleSort($inputData))();

        $this->assertEquals([0, 11, 22, 33, 44, 55, 66, 77, 88, 99], $sort);
    }
}