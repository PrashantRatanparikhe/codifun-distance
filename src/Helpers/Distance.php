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
    private static Hamming $hammingHandler;

    /** @var Levenshtein */
    private static Levenshtein $levenshteinHandler;

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
        self::$hammingHandler = new Hamming;
        self::$levenshteinHandler = new Levenshtein;
    }

    /**
     * Get Hammig Distance for given strings
     * @param string $first
     * @param string $second
     * 
     * @return int
     */
    public static function GetHammingDistance(string $first, string $second): int
    {
        return self::$hammingHandler->calculateHammingDistance($first, $second);
    }

    /**
     * Get Levenshtein Distance for given strings
     * @param string $first
     * @param string $second
     * 
     * @return int
     */
    public static function GetLevenshteinDistance(string $first, string $second): int
    {
        return self::$levenshteinHandler->calculateLevenshteinDistance($first, $second);
    }
}