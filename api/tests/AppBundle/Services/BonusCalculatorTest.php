<?php
/**
 * @author Kifah Abbad
 * Time: 11:04
 */

namespace AppBundle\Services;

use PHPUnit\Framework\TestCase;


class BonusCalculatorTest extends TestCase
{


    /**
     * @test
     */
    public function TwoMonthsReturns4()
    {
        $monthsAtWork = 2;
        $bonusCalculator = new BonusCalculator();
        $calculatedBonus = $bonusCalculator->run($monthsAtWork);
        $expectedBonus = 4;
        $this->assertEquals($expectedBonus, $calculatedBonus);
    }

    /**
     * @test
     */
    public function sixtyMonthsReturns100()
    {
        $monthsAtWork = 60;
        $bonusCalculator = new BonusCalculator();
        $calculatedBonus = $bonusCalculator->run($monthsAtWork);
        $expectedBonus = 100;
        $this->assertEquals($expectedBonus, $calculatedBonus);
    }

}
