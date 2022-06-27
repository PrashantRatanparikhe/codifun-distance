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
        $rightString = (strlen($first) > strlen($second)) ? $second : $first;
        
        $leftLength = strlen($leftString);
        $rightLength = strlen($rightString);

        if ($leftLength == 0)
            return $rightLength;

        if ($rightLength == 0)
            return $leftLength;

        if ($leftString === $rightString)
            return 0;

        if (($leftLength < $rightLength) && (strpos($rightString, $leftString) !== FALSE))
            return $rightLength - $leftLength;

        if (($rightLength < $leftLength) && (strpos($leftString, $rightString) !== FALSE))
            return $leftLength - $rightLength;

        return $this->calculateByStringComparison($rightString, $leftString);
    }

    /**
     * @param string $rightString
     * @param string $leftString
     * 
     * @return int
     */
    private function calculateByStringComparison(string $rightString, string $leftString): int
    {
        $rightLength = strlen($rightString);
        $leftLength = strlen($leftString);
        $nsDistance = range(1, $rightLength + 1);

        /** Calling calculateByLeftStringComparison for the first position of left string */
        $nLeftInitialPos = 1;
        return $this->calculateByLeftStringComparison($rightString, $leftString, $rightLength, $leftLength, $nLeftInitialPos, $nsDistance);
    }

    /**
     * @param string $rightString
     * @param string $leftString
     * @param int $rightLength
     * @param int $leftLength
     * @param int $nLeftPos
     * @param array $nsDistance
     * 
     * @return int
     */
    private function calculateByLeftStringComparison(string $rightString, string $leftString, int $rightLength, int $leftLength, int $nLeftPos, array $nsDistance): int
    {
        if ($nLeftPos <= $leftLength) {
            $cLeft = $leftString[$nLeftPos - 1];
            $nDiagonal = $nLeftPos - 1;
            $nsDistance[0] = $nLeftPos;
            $nRightInitialPos = 1;

            /** Calling calculateByRightStringComparison for the current position $nLeftPos of left string */
            $nsDistance = $this->calculateByRightStringComparison($rightString, $rightLength, $nRightInitialPos, $nsDistance, $cLeft, $nDiagonal);

            /** 
             * Recursively calling calculateByLeftStringComparison for the next position of left string 
             * It will be called untill last position of left string
             */
            $nLeftPos++;
            return $this->calculateByLeftStringComparison($rightString, $leftString, $rightLength, $leftLength, $nLeftPos, $nsDistance);
        }
        return $nsDistance[$rightLength];
    }

    /**
     * @param string $rightString
     * @param int $rightLength
     * @param int $nRightPos
     * @param array $nsDistance
     * @param string $cLeft
     * @param int $nDiagonal
     * 
     * @return array
     */
    private function calculateByRightStringComparison(string $rightString, int $rightLength, int $nRightPos, array $nsDistance, string $cLeft, int $nDiagonal): array
    {
        if ($nRightPos <= $rightLength) {
            $cRight = $rightString[$nRightPos - 1];
            $nCost = ($cRight == $cLeft) ? 0 : 1;
            $nNewDiagonal = $nsDistance[$nRightPos];
            $nsDistance[$nRightPos] = min($nsDistance[$nRightPos] + 1, $nsDistance[$nRightPos - 1] + 1, $nDiagonal + $nCost);
            $nDiagonal = $nNewDiagonal;

            /** 
             * Recursively calling calculateByLeftStringComparison for the next position of right string
             * It will be called untill last position of right string
             */
            $nRightPos++;
            return $this->calculateByRightStringComparison($rightString, $rightLength, $nRightPos, $nsDistance, $cLeft, $nDiagonal);
        }
        return $nsDistance;
    }
}