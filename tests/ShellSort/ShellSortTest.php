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
        $input = [20, 89, 6, 42, 55, 59, 41, 69, 75, 66];
        $sort = (new ShellSort($input))();

        $this->assertEquals([6, 20, 41, 42, 55, 59, 66, 69, 75, 89], $sort);
    }
}