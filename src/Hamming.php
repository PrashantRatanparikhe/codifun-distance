<?php

namespace Codifun\Distance;

/**
 * Hamming
 * @author Upwork Developer <https://github.com/pnodeskuser>
 */
class Hamming
{
    /**
     * Calculate Hamming Distance between given strings
     * @param string $first
     * @param string $second
     * 
     * @return int
     */
    public function calculateHammingDistance(string $first, string $second): int
    {
        $result = 0;
        foreach (range(0, strlen($first)) as $key => $value) {
            if (!isset($first[$key]) || !isset($second[$key])) {
                continue;
            }

            if ($first[$key] !== $second[$key]) {
            	if ((!ctype_space($first[$key]) && ctype_space($second[$key])) 
                    || (ctype_space($first[$key]) && !ctype_space($second[$key]))) {
                	continue;
                }
                $result++; 
            }
        }
        return $result;
    }
}