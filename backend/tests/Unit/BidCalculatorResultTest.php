<?php

namespace Tests\Unit;

use App\BidCalculatorResult;
use PHPUnit\Framework\TestCase;

class BidCalculatorResultTest extends TestCase {
    public function testConstructor(){
        $result = new BidCalculatorResult(
            10,
            50,
            300,
            100
        );

        $this->assertEquals(10, $result->getBasePrice());
        $this->assertEquals(50, $result->getBuyerFee());
        $this->assertEquals(300, $result->getSellerFee());
        $this->assertEquals(100, $result->getAssociationFee());
        $this->assertEquals(560, $result->getTotal());
    }
}