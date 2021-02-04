<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\Tests\ShellSort;

use Ardiakov\PhpBase\ShellSort\ShellSort;
use PHPUnit\Framework\TestCase;

/**
 * Class ShellSortTest
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class ShellSortTest extends TestCase
{
    public function testWithEmptyArray(): void
    {
        $input = [];
        $sort = (new ShellSort($input))();

        $this->assertEquals($input, $sort);
    }

    public function testWithOneElement(): void
    {
        $input = [1];
        $sort = (new ShellSort($input))();

        $this->assertEquals($input, $sort);
    }

    public function testSort(): void
    {
        $input = [5, 3, 8, 0, 7, 4, 9, 1, 6, 2];
        $sort = (new ShellSort($input))();
        $this->assertEquals([0, 1, 2, 3, 4, 5, 6, 7, 8, 9], $sort);

        $input = [20, 89, 6, 42, 55, 59, 41, 69, 75, 66];
        $sort = (new ShellSort($input))();
        $this->assertEquals([6, 20, 41, 42, 55, 59, 66, 69, 75, 89], $sort);
    }
}