<?php
/**
 * @author Kifah Abbad
 * Time: 12:55
 */

namespace AppBundle\Controller;

use AppBundle\Services\BonusCalculator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;


class CalculatorController extends AbstractController
{

    /**
     * @Route("/calculator/{months}")
     * @param int $months
     * @return JsonResponse
     */
    public function calculateAction(int $months)
    {
        $service = new BonusCalculator();
        $bonus = $service->run($months);
        $responseArray = ['bonus' => $bonus];
        return new JsonResponse($responseArray, 200);
    }

}