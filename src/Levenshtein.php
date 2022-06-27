<?php

namespace Codifun\Distance;

/**
 * Levenshtein
 * @author Upwork Developer <https://github.com/pnodeskuser>
 */
class Levenshtein
{
    /**
     * Calculate Levenshtein Distance for given strings
     * @param string $first
     * @param string $second
     * 
     * @return int
     */
    public function calculateLevenshteinDistance(string $first, string $second): int
    {
        return $this->calculate($first, $second);
    }

    /**
     * Calculate
     * @param string $first
     * @param string $second
     * 
     * @return int
     */
    private function calculate(string $first, string $second): int
    {
        $leftString = (strlen($first) > strlen($second)) ? $first : $second;
        $rightStrig = (strlen($first) > strlen($second)) ? $second : $first;
        
        $leftLength = strlen($leftString);
        $rightLength = strlen($rightStrig);

        if ($leftLength == 0)
            return $rightLength;

        if ($rightLength == 0)
            return $leftLength;

        if ($leftString === $rightStrig)
            return 0;

        if (($leftLength < $rightLength) && (strpos($rightStrig, $leftString) !== FALSE))
            return $rightLength - $leftLength;

        if (($rightLength < $leftLength) && (strpos($leftString, $rightStrig) !== FALSE))
            return $leftLength - $rightLength;

        
        $nsDistance = range(1, $rightLength + 1);
        for ($nLeftPos = 1; $nLeftPos <= $leftLength; ++$nLeftPos) {
            $cLeft = $leftString[$nLeftPos - 1];
            $nDiagonal = $nLeftPos - 1;
            $nsDistance[0] = $nLeftPos;
            for ($nRightPos = 1; $nRightPos <= $rightLength; ++$nRightPos) {
                $cRight = $rightStrig[$nRightPos - 1];
                $nCost = ($cRight == $cLeft) ? 0 : 1;
                $nNewDiagonal = $nsDistance[$nRightPos];
                $nsDistance[$nRightPos] = min($nsDistance[$nRightPos] + 1, $nsDistance[$nRightPos - 1] + 1, $nDiagonal + $nCost);
                $nDiagonal = $nNewDiagonal;
            }
        }

        return $nsDistance[$rightLength];
    }
}