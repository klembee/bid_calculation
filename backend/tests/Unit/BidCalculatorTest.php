<?php

namespace Tests\Unit;

use App\BidCalculatorOutputter;
use App\Vehicle\CommonVehicle;
use App\Vehicle\LuxuryVehicle;
use PHPUnit\Framework\TestCase;
use App\BidCalculator;

class BidCalculatorTest extends TestCase
{
    
    public function testBidCalculationWithGivenData()
    {
        $calculatedPrices = json_decode(file_get_contents(__DIR__ . "/fixtures/vehiclePrices.json"), true);

        foreach($calculatedPrices as $priceData){
            $vehicle = match($priceData["type"]){
                'common' => new CommonVehicle($priceData["price"]),
                'luxury' => new LuxuryVehicle($priceData["price"]),
            };

            $calculator = new BidCalculator($vehicle);
            $outputter = new BidCalculatorOutputter($calculator);
    
            $this->assertEquals($priceData["total"], $outputter->toArray()['total']);
        }        
    }

    public function testBidCalculation(){
        $vehicle = new CommonVehicle(1);
        $calculator = new BidCalculator($vehicle);
        $outputter = new BidCalculatorOutputter($calculator);
        $this->assertEquals(116.02, $outputter->toArray()["total"]);
    }
}