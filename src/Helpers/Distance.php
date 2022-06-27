<?php

namespace Codifun\Distance\Helpers;

use Codifun\Distance\Hamming;
use Codifun\Distance\Levenshtein;

/**
 * Distance
 * @author Upwork Developer <https://github.com/pnodeskuser>
 */
trait Distance
{
    /** @var Hamming */
    private Hamming $hammingHandler;

    /** @var Levenshtein */
    private Levenshtein $levenshteinHandler;

    public function __construct()
    {
        $this->bootDistanceTrait();
    }

    /**
     * Boot distance trait
     * 
     * @return void
     */
    public function bootDistanceTrait(): void
    {
        $this->hammingHandler = new Hamming;
        $this->levenshteinHandler = new Levenshtein;
    }

    /**
     * Get Hammig Distance for given strings
     * @param string $first
     * @param string $second
     * 
     * @return int
     */
    public function getHammingDistance(string $first, string $second): int
    {
        return $this->hammingHandler->calculateHammingDistance($first, $second);
    }

    /**
     * Get Levenshtein Distance for given strings
     * @param string $first
     * @param string $second
     * 
     * @return int
     */
    public function getLevenshteinDistance(string $first, string $second): int
    {
        return $this->levenshteinHandler->calculateLevenshteinDistance($first, $second);
    }
}