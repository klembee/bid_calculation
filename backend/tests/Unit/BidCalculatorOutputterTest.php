<?php

namespace Tests\Unit;

use App\BidCalculator;
use App\BidCalculatorOutputter;
use App\Vehicle\CommonVehicle;
use PHPUnit\Framework\TestCase;

class BidCalculatorOutputterTest extends TestCase {
    public function testJSONOuput(){
        $vehicle = new CommonVehicle(398);
        $calculator = new BidCalculator($vehicle);
        $outputter = new BidCalculatorOutputter($calculator);

        $this->assertEquals('{"base_price":398,"fees":{"buyer_fee":39.8,"seller_fee":7.96,"association_fee":5,"storage_fee":100},"total":550.76}', $outputter->toJSON());
    }

    public function testHTMLOutput(){
        $vehicle = new CommonVehicle(398);
        $calculator = new BidCalculator($vehicle);
        $outputter = new BidCalculatorOutputter($calculator);

        $this->assertEquals("<p>Base Price: 398. <b>Total: 550.76</b></p>", $outputter->toHTML());
    }
}