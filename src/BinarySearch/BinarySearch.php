<?php

declare(strict_types=1);

namespace Ardiakov\PhpBase\BinarySearch;

/**
 * Class BinarySearch
 *
 * @author Artem Diakov <adiakov.work@gmail.com>
 */
final class BinarySearch
{
    /**
     * @var array
     */
    private array $integers;

    /**
     * BinarySearch constructor.
     *
     * @param array $integers
     */
    public function __construct(array $integers)
    {
        $this->integers = $integers;
    }

    /**
     * Найти элемент использую бинарный поиск
     *
     * @param int $search
     *
     * @return int|null
     */
    public function __invoke(int $search): ?int
    {
        if ([] === $this->integers) {
            return null;
        }

        if (count($this->integers) === 1) {
            if ($this->integers[0] === $search) {
                return $search;
            }

            return null;
        }

        $left = 0;
        $right = count($this->integers);

        $recursive = function ($left, $right) use ($search, &$recursive) {
            $mid = round(($left + $right) / 2, 0,PHP_ROUND_HALF_DOWN);

            if ($search > $this->integers[$mid]) {
                return $recursive($mid, $right);
            }

            if ($search < $this->integers[$mid]) {
                return $recursive($left, $mid);
            }

            if ($search === $this->integers[$mid]) {
                return $search;
            }
        };

        return $recursive($left, $right) ?: null;
    }
}