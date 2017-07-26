<?php


namespace AppBundle\Services;


/**
 * Class BonusCalculator
 * calculates the bonus for a company worker, based on how long she is working in the company (in months)
 * @package AppBundle\Services
 */
class BonusCalculator
{
    const BONUS_MULTIPLIER = 2;
    const MAX_MONTHS = 50;
    public function run(int $monthsAtWork): float
    {
        if ($this->maximumMonthsReached($monthsAtWork)) {
            return 100;
        }
        return self::BONUS_MULTIPLIER * $monthsAtWork;
    }
    /**
     * @param int $monthsAtWork
     * @return bool
     */
    private function maximumMonthsReached(int $monthsAtWork): bool
    {
        return $monthsAtWork >= self::MAX_MONTHS;
    }
}