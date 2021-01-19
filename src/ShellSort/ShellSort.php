<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\ShellSort;

/**
 * Class ShellSort
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class ShellSort
{
    /**
     * @var array
     */
    private array $integers;

    /**
     * @var int
     */
    private int   $count;

    public function __construct(array $integers)
    {
        $this->integers = $integers;
        $this->count = count($integers);
    }

    public function __invoke()
    {
        if ([] === $this->integers) {
            return $this->integers;
        }

        if (1 === $this->count) {
            return $this->integers;
        }

        $recursive = function ($numbs) {
            $middle = round($numbs / 2, 0, PHP_ROUND_HALF_DOWN);


        };

        $recursive($this->count);




    }
}